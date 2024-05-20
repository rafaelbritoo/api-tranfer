<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Wallet extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'wallets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customers_id',
        'amount',
    ];

    public function belongsToCustomer(): bool
    {
        return $this->attributes['customers_id'] == Customer::class;
    }

    public function hasAmount(int $amount): bool
    {
        return $this->amount < $amount;
    }

}
