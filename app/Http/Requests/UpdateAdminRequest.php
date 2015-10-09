<?php

namespace PosgradoService\Http\Requests;

use Carbon\Carbon;
use PosgradoService\Http\Requests\Request;

class UpdateAdminRequest extends Request
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
    {   //que la fecha sea mayor de 18 años pero no mayor de 100 para el maximo
        $fechaMinCumple = Carbon::now()->subYears(100);
        $fechaMaxCumple = Carbon::now()->subYears(18);
        $idUser = $request->idUser;
        return [
            'name'                  =>'required|',
            'apellidoP'             =>'required|',
            'apellidoM'             =>'required|',
            'fechanac'              =>'required|date|after:'.$fechaMinCumple.'|before:'.$fechaMaxCumple,
            'nacionalidad'          =>'required|',
            'edoNacimiento'         =>'required|',
            'genero'                =>'required|in:Hombre,Mujer',
            'rfc'                   =>'required|unique:users,rfc,'.$idUser,
            'curp'                  =>'required|unique:users,curp,'.$idUser,
            'tipoIdOficial'         =>'required|in:ife,licenciaManejo,pasaporte,cartilla,cedula,docMigrat,certMatriConsul',
            'noIdOficial'           =>'unique:users,noIdOficial,'.$idUser,
            'direccion'             =>'',
            'colonia'               => 'required_with:direccion',
            'ciudad'                => 'required_with:colonia',
            'estado'                => 'required_with:ciudad',
            'cp'                    => 'required_with:cp',
            'telefono'              =>'',
            'telMovil'              =>'',
            'edoCivil'              =>'',
            'numHijos'              =>'integer|min:0',
            'email'                 =>'required|email|unique:users,email,'.$idUser,
            'password'              =>'',
        ];
    }
}
