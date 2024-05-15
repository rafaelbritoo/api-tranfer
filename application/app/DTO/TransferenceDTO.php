<?php

namespace App\DTO;

readonly class TransferenceDTO
{
    public function __construct(
        public string $payerId,
        public string $payeeId,
        public int    $amount
    )
    {
    }
}
