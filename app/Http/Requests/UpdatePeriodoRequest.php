<?php namespace PosgradoService\Http\Requests;


use PosgradoService\Http\Requests\Request;

class UpdatePeriodoRequest extends Request {

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
            'id'=>'required',
            'nombre' => 'required',
            'inicioPeriodo' => 'required | date',
            'finPeriodo' => 'required | date',
            'inicioCalificaciones'=>'required|date',
            'finCalificaciones'=>'required|date',
        ];
    }

}