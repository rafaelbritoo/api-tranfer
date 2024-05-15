<?php

namespace App\Contracts;

interface NotificationContract
{
    public function getRetailerName();
    public function sendPaymentApproval(): bool;
}
