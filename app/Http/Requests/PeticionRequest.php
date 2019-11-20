<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeticionRequest extends FormRequest
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
            'responsable_id'=> 'required',
            'ug'=> 'required',
            'id_grupo'=> 'required',
            'id_cliente'=> 'required',
            'producto'=> 'required',
            'tarifa'=> 'required',
            'rentabilidad'=> 'required',
            'reciprocidad'=> 'required',
            'reciprocidad_num'=> 'required',
            'argumento'=> 'required',
        ];
    }
}
