<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permite que cualquier usuario autorizado use este request
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'desarrolladora' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'fechalanzamiento' => 'required|date',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ];
    }
}
