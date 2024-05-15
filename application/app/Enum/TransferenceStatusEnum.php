<?php

namespace App\Enum;


enum TransferenceStatusEnum: string
{
    case Pending = 'pending';
    case Rejected = 'rejected';
    case Accepted = 'accepted';
    case Done = 'done';

}
