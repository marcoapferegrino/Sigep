<?php

namespace Sigep\Http\Requests;

use Carbon\Carbon;
use Sigep\Http\Requests\Request;

class UpdateGrupoRequest extends Request
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
            'nombre' =>' required|unique:grupos,nombre,'.$request->id ,
            'salon' =>'required| ' ,
            'semestre'=>' required| '

        ];
    }
}

