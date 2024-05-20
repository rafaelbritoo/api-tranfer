<?php

namespace App\Http\Requests;

use App\DTO\TransferenceDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Wallet;

class CreateTransferenceRequest extends FormRequest
{
    /**
     * Função que autoriza a transferência.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação para a solicitação.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'payer_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Wallet::where('id', $value)->exists()) {
                        thro("O ID de carteira '$value' não existe na tabela wallets.");
                    }
                },
            ],
            'payee_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Wallet::where('id', $value)->exists()) {
                        dd("O ID de carteira '$value' não existe na tabela wallets.");
                    }
                },
            ],
            'amount' => ['required', 'numeric'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator);
    }
    /**
     * Converte a solicitação em um DTO para transferência.
     *
     * @return TransferenceDTO
     */
    public function toDTO(): TransferenceDTO
    {
        $payerId = $this->input('payer_id');
        $payeeId = $this->input('payee_id');
        $amount = $this->input('amount');

        return new TransferenceDTO(
            payerId: $payerId,
            payeeId: $payeeId,
            amount: $amount
        );
    }
}