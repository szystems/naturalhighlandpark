<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoInmuebleFormRequest extends FormRequest
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
            'nombre'=>'required',
            'descripcion'=>'max:500',
            'maxpersonas'=>'required',
            'minpersonas'=>'required',
            'menoresxpareja'=>'required',
            'estado_tipoinmueble'=>'max:20',
            'estado'=>'max:20',
            'mascotas'=>'max:5',
            'maxmascotas'=>'max:11'
        ];
    }
}
