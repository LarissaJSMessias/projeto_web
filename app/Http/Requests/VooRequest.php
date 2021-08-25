<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VooRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'numero'=>'required|string|max:100',
            'valor'=>'required|string|max:20',
            'saida'=>'required|string|max:20',
            'chegada'=>'required|string|max:100',
            'tempovoo'=>'required|string|max:15',
            'aeroportosaida'=>'required|string|max:100',
            'aeroportochegada'=>'required|string|max:100',
        ];
    }
}
