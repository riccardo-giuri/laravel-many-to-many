<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
        return [
            'title' => "required|max:255",
            'description' => "required",
            'imageURL' => "nullable|image|max:7000",
            'githubURL' => "required",
            'finished' => "required",
            'type_id' => "nullable|exists:types,id"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'imageURL.max' => 'l\'immagine è troppo grande, massimo 7MB!',
        ];
    }
}
