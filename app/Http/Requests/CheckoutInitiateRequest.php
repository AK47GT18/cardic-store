<?php

namespace App\Http\Requests;

use App\Services\SanitizerService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutInitiateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email:rfc', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'payment_method' => ['nullable', 'string', 'max:40'],
            'items' => ['required', 'array', 'min:1', 'max:20'],
            'items.*.id' => ['required', 'string', 'max:80'],
            'items.*.denom' => ['nullable', 'numeric', 'min:5', 'max:2000'],
            'items.*.price' => ['required', 'numeric', 'min:5', 'max:2000'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:50'],
            'items.*.name' => ['nullable', 'string', 'max:150'],
            'items.*.brand' => ['nullable', 'string', 'max:80'],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);

        if (is_array($data)) {
            $data['email'] = SanitizerService::cleanEmail($data['email'] ?? '');
            $data['phone'] = SanitizerService::cleanPhone($data['phone'] ?? null);
            $data['payment_method'] = SanitizerService::cleanString($data['payment_method'] ?? 'paychangu', 40);
            $data['items'] = SanitizerService::cleanArray($data['items'] ?? []);
            foreach ($data['items'] as &$item) {
                if (empty($item['denom']) && ! empty($item['price'])) {
                    $item['denom'] = $item['price'];
                }
            }
            unset($item);
        }

        return $data;
    }
}
