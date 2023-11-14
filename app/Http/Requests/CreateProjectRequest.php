<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'link_github' => 'required',
            'link_website' => 'required',
            'content' => 'nullable',
            'cover_image'=> 'nullable|image',
            'type_id'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il titolo è obbligatorio!',
            'name.min' => 'Il titolo deve avere almeno 2 caratteri!',
            'name.max' => 'Il titolo può avere massimo 100 caratteri!',
            'link_github.required' => 'Il link della repository di github è obbligatorio!',
            'link_website.required' => 'Il link del sito web è obbligatorio!',
            'type_id.required'=> 'Seleziona una tipologia di file!',
        ];
    }
}
