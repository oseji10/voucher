<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;


class Voucher extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payee',
        'email',
        'password',
    ];

    public $table = "vouchers";

    protected $casts = [
        'payment_description' => 'array',
        'payment_rate' => 'array',
        'payment_amount' => 'array',
    ];


}
