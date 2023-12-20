<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name','image'];

    // public function validate()
    // {
    //     $validator = Validator::make($this->attributes, $this->rules(), $this->feedback());

    //     if ($validator->fails()) {
    //         throw new ValidationException($validator);
    //     }
    // }

    // // Regras de validação
    // protected function rules()
    // {
    //     return [
    //         'name' => 'required|unique:brands,name,|min:3', //1tabela 2nomedacoluna é o nome do input, 3id do registro que será desconsiderado na pesquisa
    //         'image' => 'required',
           
    //     ];
    // }
    
    // public function feedback(){
    //     return  
    //      [
    //         'required' => 'O campo :attribute é obrigatório',
    //         'name.unique' => 'O nome da marca já existe',
    //         'name.min' => 'O nome deve ter no minimo 3 caracteres',
    //      ];
        
    // }
    
}
