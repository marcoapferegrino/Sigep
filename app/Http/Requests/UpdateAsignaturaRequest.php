<?php

namespace PosgradoService\Http\Requests;

use PosgradoService\Http\Requests\Request;
use Illuminate\Routing\Route;

class UpdateAsignaturaRequest extends Request
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
    public function rules(\Illuminate\Http\Request $request)
    {


        return [

            'nombre'        => 'required | unique:asignaturas,nombre,'.$request->id,
            'creditos'      => 'required | integer',
            'horasPract'    => 'required | integer',
            'horasTeoricas' => 'required | integer',
            'tipo'          => 'required | in:obligatoria,seminario,optativa,estancia',
            'fechaElabP'    => 'required | date',

        ];
    }
}
