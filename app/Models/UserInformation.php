<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;

    protected $table = 'user_information';
    public $timestamps = false; // Disable automatic timestamps
    protected $primaryKey = 'user_info_id';

    // Define the relationship to the User model
    public function userAccount()
    {
        return $this->belongsTo(UserInformation::class, 'user_id');
    }
    protected $fillable = [
        'user_id',
        'first_name',
        'mid_name',
        'last_name',
        'gender',
        'birth_date',
        'phone_number',
        'subs_status',
        'created_at',
        'modified_at',
    ];
}
