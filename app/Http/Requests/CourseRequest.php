<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
        $course = $this->route('course');

        return [
            'name' => [
                'required', 
                'string', 
                Rule::unique('courses')->ignore($course)
            ],
            'description' => ['required', 'string'],
            'cost' => ['required', 'numeric'],
            'duration' => ['required', 'integer'],
            'academy_id' => ['required', 'exists:academies,id'],
        ];
    }
}
