<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome'=>'required|string|max:100',
            'cpf'=>'required|string|max:15',
            'telefone'=>'required|string|max:20',
            'email'=>'required|string|max:100',
        ];
    }
}
