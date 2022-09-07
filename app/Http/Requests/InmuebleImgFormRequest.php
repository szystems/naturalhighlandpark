<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use sisVentasWeb\Http\Requests;

class InmuebleImgFormRequest extends FormRequest
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
            'idinmueble'=>'required',
            'imagen'=>'required|mimes:jpg,jpeg,bmp,png|max:10000'
        ];
    }
}
