<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enum\TransferenceStatusEnum;

class Transfer extends Model
{
    protected $table = 'transfers';

    protected $fillable = [
        'id',
        'payer_id',
        'payee_id',
        'amount',
        'status'
    ];

    protected $casts = [
        'status' => TransferenceStatusEnum::class,
        'amount' => 'integer'
    ];
}
