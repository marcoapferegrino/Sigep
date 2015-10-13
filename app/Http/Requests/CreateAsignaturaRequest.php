<?php

namespace Sigep\Http\Requests;

use Sigep\Http\Requests\Request;

class CreateAsignaturaRequest extends Request
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
            'nombre'            => 'required | unique:asignaturas,nombre',
            'creditos'          => 'required | integer',
            'claveAsignatura'   =>'required  | unique:asignaturas,claveAsignatura',
            'curso'             => 'required | in:Teórico,Práctico,T/P',
            'horas'             => 'required | integer',
            'tipo'              => 'required | in:obligatoria,seminario,optativa,movilidad',
            'fechaVigencia'     => 'required | date',

        ];
    }
}
