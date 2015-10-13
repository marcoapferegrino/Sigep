<?php namespace Sigep\Http\Requests;


use Sigep\Http\Requests\Request;

class CreateProgramaRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {	//para ver si el usuario tiene acceso a este metodo
        //return false;
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
            'escuela' => 'required',
            'nombre' => 'required',
            'periodo_id' => 'required|integer'

        ];
    }

}