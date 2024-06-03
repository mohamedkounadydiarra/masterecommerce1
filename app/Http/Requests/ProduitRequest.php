<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
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
            'designation' => 'required|min:2',
            'description' => 'required|min:2',
            'prix' => 'required|min:4',
            'photo' => 'required|mimes:jpeg,jpg,png|max:10048',
            'idcategorie' => 'required'
        ];
    }
}
