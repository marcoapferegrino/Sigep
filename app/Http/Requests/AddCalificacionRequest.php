<?php

namespace Sigep\Http\Requests;

use Sigep\Http\Requests\Request;

class AddCalificacionRequest extends Request
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
        $rules = [
            'calificaciones'=> 'array',
            'inscripcion_ids' => 'array',
            'acta' => 'integer|accepted'
        ];
        foreach($this->request->get('calificaciones') as $key => $val)
        {
            $rules['calificaciones.'.$key] = 'in:0,1,2,3,4,5,6,7,8,9,10,NP';
        }

        foreach($this->request->get('inscripcion_ids') as $key => $val)
        {
            $rules['inscripcion_ids.'.$key] = 'required|integer';
        }
        return $rules;
    }
}
