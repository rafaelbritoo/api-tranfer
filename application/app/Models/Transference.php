<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enum\TransferenceStatusEnum;

class Transference extends Model
{
    protected $table = 'transferences';

    protected $fillable = [
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
