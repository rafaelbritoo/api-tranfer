<?php

namespace App\Http\Controllers;

use App\Services\TransferService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Requests\CreateTransferRequest;

class TransferController extends Controller
{
    public function __construct(
        private readonly TransferService $transferService
    )
    {
    }

    /**
     * Rota que realiza a transferencia
     * @param CreateTransferenceRequest $request
     * @return Response
     * @throws \App\Exceptions\TransferException
     */
    public function postTransfer(
        CreateTransferenceRequest $request
    ): Response
    {
        $this->transferService->handle($request->toDTO());
        return response()->noContent();
    }
}
