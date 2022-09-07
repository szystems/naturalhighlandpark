<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemporadaFormRequest extends FormRequest
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
            'fecha_inicial'=>'required',
            'fecha_final'=>'required',
            'precio'=>'required',
            'preciomenor'=>'required',
            'preciomascota'=>'required',
            'promopersonagratis'=>'required|max:20',
            'promonumpersonas'=>'required',
            'estado_temporada'=>'max:20',
            'estado'=>'max:20'
        ];
    }
}
