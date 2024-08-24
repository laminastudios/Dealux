<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInformation extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'payment_information';

    // The primary key for the model
    protected $primaryKey = 'payment_info_id';

    // Indicates if the model should be timestamped.
    public $timestamps = false;

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'delivery_address',
        'card_type',
        'name_on_card',
        'card_number',
        'expiry_date',
        'cvv',
    ];

    // Additional methods and relationships can be added here
}
