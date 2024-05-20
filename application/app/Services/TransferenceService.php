<?php

namespace App\Services;

use App\Contracts\NotificationContract;
use App\Contracts\PaymentGatewayContract;
use App\DTO\TransferenceDTO;
use App\Enum\TransferenceStatusEnum;
use App\Exceptions\TransferenceException;
use App\Models\Customer;
use App\Models\Wallet;
use App\Repositories\CustomerRepository;
use App\Repositories\TransferenceRepository;
use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\DB;

class TransferenceService
{
    public function __construct(
//        private TransferenceRepository     $transferRepository,
//        private WalletRepository           $walletRepository,
//        private PaymentGatewayContract     $paymentGateway,
//        private NotificationContract       $notificationContract,
//        private CustomerRepository         $customerRepository,
    )
    {
    }

    /**
     * @throws TransferenceException
     */
    public function handle(TransferenceDTO $transferDTO): bool
    {
        dd('transf');
        // payer validations
//        $payerWallet   = $this->walletRepository->findById($transferDTO->payerId);
//        $payerCustomer = $this->customerRepository->findById($transferDTO->payerId);
//
//        $this->validatePaymentConditions($payerWallet, $payerCustomer, $transferDTO);
//
//
//        return DB::transaction(function () use ($payerWallet, $transferDTO) {
//            $transaction = $this->transferRepository->startTransfer($transferDTO);
//            $payeeWallet = $this->walletRepository->findById($transferDTO->payeeId);
//
//            $this->walletRepository->deposit($payeeWallet->getKey(), $transferDTO->amount);
//            $this->walletRepository->withdrawal($payerWallet->getKey(), $transferDTO->amount);
//            $this->transferRepository->updateTransferStatus($transaction->getKey(), TransferenceStatusEnum::Done);
//
//            if (!$this->paymentGateway->authorizePayment()) {
//                throw TransferenceException::notAuthorizedByGateway($this->paymentGateway);
//            }
//
//            if (!$this->notificationContract->sendPaymentApproval()) {
//                throw TransferenceException::paymentMessageNotSent($this->notificationContract);
//            }

            return true;
//        });
    }

    /**
     * @throws TransferenceException
     */
    private function validatePaymentConditions(Wallet $payerWallet, Customer $payerCustomer, TransferenceDTO $transferDTO): void
    {
        if ($payerCustomer->isRetailer()) {
            throw TransferenceException::customerNotAllowedToPay();
        }

        if ($payerWallet->hasAmount($transferDTO->amount)) {
            throw TransferenceException::outOfPocket();
        }
    }

}
