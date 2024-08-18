<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // Specify the table associated with the model
    protected $table = 'user_account';

    // Specify the primary key
    protected $primaryKey = 'user_id';
    // Specify the type of the primary key
    protected $keyType = 'string';

    // Disable timestamps if you don't have them
    public $timestamps = false;

    // Fillable fields
    protected $fillable = [
        'user_id',
        'user_name',
        'email',
        'password',
        'created_at',
        'modified_at',
    ];

    // Hidden fields
    protected $hidden = [
        'password',
    ];

    // Casts for attributes
    protected $casts = [
        'created_at' => 'datetime',
        'modified_at' => 'datetime',
    ];

    // Custom accessor for username
    public function getNameAttribute()
    {
        return $this->user_name;
    }
    
    // Custom mutator for password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function markEmailAsVerified()
    {
        $this->created_at = now();
        $this->save();
    }

    public function hasVerifiedEmail()
    {
        return !is_null($this->created_at);
    }

}
