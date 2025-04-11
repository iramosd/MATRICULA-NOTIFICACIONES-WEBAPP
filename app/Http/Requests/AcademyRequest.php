<?php

namespace App\Http\Requests;

use App\Models\Academy;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AcademyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $academy = $this->route('academy');

        return [
            'name' => [
                'required', 
                'string', 
                Rule::unique('academies')->ignore($academy)
            ],
            'email' => [
                'required', 
                'string', 
                Rule::unique('academies')->ignore($academy)
            ],
            'description' => ['nullable', 'string'],
            'address' =>['nullable', 'string'],
            'phone' => ['nullable', 'string'],
        ];
    }
}
