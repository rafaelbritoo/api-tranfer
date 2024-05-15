<?php

namespace App\Repositories;

use App\DTO\TransferenceDTO;
use App\Enum\TransferenceStatusEnum;
use App\Models\Transference;
use Illuminate\Database\Eloquent\Collection;

class TransferenceRepository
{
    public function __construct(protected Transference $transfer)
    {
    }
    public function startTransfer(TransferenceDTO $payload): Transference
    {
        return $this->transfer->create([
            'payer_id' => $payload->payerId,
            'payee_id' => $payload->payeeId,
            'amount' => $payload->amount,
            'status' => TransferenceStatusEnum::Accepted,
        ]);
    }

    public function updateTransferStatus(string $transferId, TransferenceStatusEnum $status)
    {
        return $this->transfer->find($transferId)->update([
            'status' => $status
        ]);
    }
}
