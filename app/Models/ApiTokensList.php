<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTokensList extends Model
{
    use HasFactory;

    protected $table = 'api_tokens_list';

    public $timestamps = false;

    protected $primaryKey = 'api_token_id';

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    protected $fillable = [
        'user_id',
        'api_token',
        'number_of_uses',
        'created_at',
        'modified_at',
    ];
}
