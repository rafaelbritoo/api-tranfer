<?php

namespace App\Repositories;

use App\Models\Wallet;
use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Collection;
use \Illuminate\Database\Eloquent\Model;

class WalletRepository
{
    /**
     * Pega pelo id da carteira
     * @param string $walletId
     * @return
     */
    public function findById(string $walletId): Wallet
    {
        return Wallet::query()->find();
    }

    /**
     * Faz um deposito na carteira pelo seu id
     * @param string $walletId
     * @param int $amount
     * @return bool
     */
    public function deposit(string $walletId, int $amount): bool
    {
        return Wallet::query()
            ->find($walletId)
            ->increment('amount', $amount);
    }

    /**
     * Camcela transferencia na carteira
     * @param string $walletId
     * @param int $amount
     * @return bool
     */
    public function withdrawal(string $walletId, int $amount): bool
    {
        return Wallet::query()
            ->find($walletId)
            ->decrement('amount', $amount);
    }
}
