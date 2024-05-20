<?php

namespace App\Http\Controllers\API;

use App\Exceptions\TransferenceException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTransferenceRequest;
use App\Services\TransferenceService;
use Illuminate\Http\Response;

class TransferenceController extends Controller
{
    private TransferenceService $transferenceService;
    public function __construct(
        TransferenceService $transferenceService
    )
    {
        $this->transferenceService = $transferenceService;
    }

    /**
     * Rota que realiza a transferencia
     * @param CreateTransferenceRequest $request
     * @return Response
     * @throws TransferenceException
     */
    public function postTransference(CreateTransferenceRequest $request): Response
    {
        $this->transferenceService->handle($request->toDTO());
        return response()->noContent();
    }

    public function show()
    {
        return response()->json(['1'=>'ssssseeeee']);
    }

}
