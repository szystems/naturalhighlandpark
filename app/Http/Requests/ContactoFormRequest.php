<?php

namespace sisVentasWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoFormRequest extends FormRequest
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
            'name1'=>'required|max:100',
            'email1'=>'required|max:100|email',
            'phone1'=>'required|max:20',
            'subject1'=>'required|max:50',
            'mensaje1'=>'required',
        ];
    }
}
