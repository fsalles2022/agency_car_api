<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBrandRequest extends FormRequest
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
            'name' => 'required|unique:brands|min:3|max:255',
            'image' =>'required|file|mimes:png,jpeg,webp',
        ];
    }

    // public function message(): array{
    //     return  
    //      [
    //         'required' => 'O campo :attribute é obrigatório',
    //         'name.unique' => 'O nome da marca já existe',
    //         'name.min' => 'O nome deve ter no minimo 3 caracteres',
    //      ];
        
    // }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Erro de validação',
            'errors' => $validator->errors(),
        ], 422));
    }
}
