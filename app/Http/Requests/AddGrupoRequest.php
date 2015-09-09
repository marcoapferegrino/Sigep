<?php

namespace PosgradoService\Http\Requests;

use Carbon\Carbon;
use PosgradoService\Http\Requests\Request;

class AddGrupoRequest extends Request
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


            'nombre' =>' required|',
            'salon' =>'required| ' ,
            'semestre'=>' required| '

        ];
    }
}

