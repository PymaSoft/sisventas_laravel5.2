<?php

namespace sisventas\Http\Requests;

use sisventas\Http\Requests\Request;

class ArticuloFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cat_id',
            'art_codigo',
            'art_nombre',
            'art_stock',
            'art_descripcion',
            'art_imagen',
            'art_estado'
        ];
    }
}
