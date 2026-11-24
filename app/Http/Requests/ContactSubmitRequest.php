<?php

namespace App\Http\Requests;

use App\Services\SanitizerService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'string', 'email:rfc', 'max:150'],
            'company' => ['nullable', 'string', 'max:150'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:5', 'max:3000'],
        ];
    }

    /**
     * Sanitize inputs before or after validation.
     *
     * @return array<string, mixed>
     */
    public function validated($key = null, $default = null)
    {
        $data = parent::validated($key, $default);

        if (is_array($data)) {
            $data['name'] = SanitizerService::cleanString($data['name'] ?? '', 100);
            $data['email'] = SanitizerService::cleanEmail($data['email'] ?? '');
            $data['company'] = SanitizerService::cleanString($data['company'] ?? null, 150);
            $data['phone'] = SanitizerService::cleanPhone($data['phone'] ?? null);
            $data['subject'] = SanitizerService::cleanString($data['subject'] ?? null, 200);
            $data['message'] = SanitizerService::cleanString($data['message'] ?? '', 3000);
        }

        return $data;
    }
}
