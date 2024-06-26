<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table = 'paymentinfos';

    protected $fillable = [
        'patient', 'description', 'amount', 'balance', 'date',
    ];

}

