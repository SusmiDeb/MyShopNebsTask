<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PdfResourceRequest extends FormRequest
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
            // Base
            'title'       => ['required', 'string', 'max:255'],
            'slug'        => ['nullable', 'string', 'max:255'], // খালি দিলে কন্ট্রোলার বানাবে
            'description' => ['nullable', 'string', 'max:2000'],

            // Relation (হাসল টেবিল থাকলে এই রুল রাখুন)
            'hustle_id'   => ['nullable', 'integer'],
            // 'hustle_id'   => ['nullable', 'exists:hustles,id'],

            // Publish toggle
            'published'   => ['sometimes', 'boolean'],

            // File (create এ আবশ্যক, update এ optional)
            'file'        => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'file',
                'mimes:pdf',
                'max:20480', // 20MB
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'file.mimes' => 'Only PDF files are allowed.',
        ];
    }
}
