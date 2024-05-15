<?php

namespace App\Http\Controllers;

use App\Exceptions\TransferenceException;
use App\Services\TransferenceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Requests\CreateTransferenceRequest;
use App\Contracts\PaymentGatewayContract;

class TransferenceController extends Controller
{
    public function __construct(
        private readonly TransferenceService $transferService
    )
    {
    }

    /**
     * Rota que realiza a transferencia
     * @param CreateTransferenceRequest $request
     * @return Response
     * @throws TransferenceException
     */
    public function postTransfer(
        CreateTransferenceRequest $request
    ): Response
    {
        $this->transferService->handle($request->toDTO());
        return response()->noContent();
    }
}
