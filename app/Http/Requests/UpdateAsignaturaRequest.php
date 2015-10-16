<?php

namespace Sigep\Http\Requests;

use Sigep\Http\Requests\Request;
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
            'horas'             => 'required | integer',
            'claveAsignatura'   =>'required| unique:asignaturas,claveAsignatura,'.$request->id,
            'curso'             => 'required| in:Teórico,Práctico,T/P,Seminario',
            'tipo'          => 'required | in:obligatoria,seminario,optativa,estancia',
            'fechaVigencia'        => 'required | date',

        ];
    }
}
