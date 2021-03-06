<?php

namespace Sigep\Http\Requests;

use Sigep\Http\Requests\Request;

class UpdateAsignaturaGrupoRequest extends Request
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

            'docente_id'  => 'required |',
           // 'grupo_id'  =>'required |',
            'asignatura_id' => 'required |',
            //'horaDias_id' =>'required |'
           // 'acta'=> 'required|'
        ];
    }
}
