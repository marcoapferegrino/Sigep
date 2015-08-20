<?php

namespace PosgradoService\Http\Requests;

use PosgradoService\Http\Requests\Request;

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
            'nombre'        => 'required | unique:asignaturas,nombre',
            'creditos'      => 'required | integer',
            'horasPract'    => 'required | integer',
            'horasTeoricas' => 'required | integer',
            'tipo'          => 'required | in:obligatoria,seminario,optativa,estancia',
            'fechaElabP'    => 'required | date',

        ];
    }
}
