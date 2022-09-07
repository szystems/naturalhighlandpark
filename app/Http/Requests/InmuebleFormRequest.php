<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InmuebleFormRequest extends FormRequest
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
            'idtipo_inmueble'=>'required',
            'nombre'=>'required',
            'descripcion'=>'max:500',
            'estado_inmueble'=>'max:20',
            'estado'=>'max:20'
        ];
    }
}
