<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletTransfer extends Model
{
    protected $table = 'wallet_transfers';

    protected $fillable = [
        'user_id',
        'trx_id',
        'username',
        'amount',
        'wallet_type',
        'status',
    ];
}
