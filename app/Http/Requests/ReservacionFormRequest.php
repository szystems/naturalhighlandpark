<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservacionFormRequest extends FormRequest
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
            'idhuesped'=>'required',
            'abonado'=>'required|numeric',
            'tipo_pago'=>'required',
            'estado_reservacion'=>'required',
            'comentarios'=>'max:500',
            'no_transaccion'=>'max:50',
            'imagen_transaccion'=>'mimes:jpg,jpeg,bmp,png|max:10000'
        ];
    }
}
