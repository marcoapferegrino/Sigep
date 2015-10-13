<?php

namespace Sigep\Http\Requests;

use Carbon\Carbon;
use Sigep\Entities\User;
use Sigep\Http\Requests\Request;

class UpdateDocenteRequest extends Request {


    public  $password;

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

        $fechaMinCumple = Carbon::now()->subYears(100);
        $fechaMaxCumple = Carbon::now()->subYears(18);
        $idUser = $request->idUser;
        $user = User::find($idUser);
        $idDocente = $user->docente_id;

        return [

            'status'                   => 'required | in:Activo,Licencia,Con goce de sueldo,Licencia sin goce de sueldo,Cambios de adscripción,Semestre sabático,Año sabático,Otro(observaciones profesor)',

            'name'                     => 'required | ',
            'apellidoP'                => 'required | ',
            'apellidoM'                => 'required | ',
            'fechanac'                 => 'required|date|after:'.$fechaMinCumple.'|before:'.$fechaMaxCumple,
            'password'                 => '',
            'nacionalidad'             => 'required | ',
            'edoNacimiento'            => 'required | ',
            'genero'                   => 'required | in:Hombre,Mujer',
            'rfc'                      =>'required|unique:users,rfc,'.$idUser,
            'curp'                     =>'required|unique:users,curp,'.$idUser,
            'extensionIpn'             => '',
            'categoria'                => 'required|in:Asociado,Titular',
            'noIdOficial'              => 'unique:users,noIdOficial,'.$idUser,
            'escuelaLugarIpn'          => 'required | ',

            'tipoIdOficial'            =>'required|in:ife,licenciaManejo,pasaporte,cartilla,cedula,docMigrat,certMatriConsul',
            'email'                    => 'required|email|unique:users,email,'.$idUser,
            'email2'                   => 'email',
            'direccion'                => '',
            'colonia'                  => 'required_with:direccion',
            'ciudad'                   => 'required_with:colonia',
            'estado'                   => 'required_with:ciudad',
            'cp'                       => 'required_with:cp',
            'telefono'=>'',
            'telMovil' =>'',
            'edoCivil' =>'',
            'numHijos'=>'integer|min:0',

            'nivel'                    => 'required |in:A,B,C',
            'clavePresupuestal'        => 'required |',
            'ingresoIpn'               => 'required|date',
            'numEmpleado'              => 'required|unique:docentes,numEmpleado,'.$idDocente,
            'numTarjetaEscom'          => 'required',
            'sip'                      => 'required|unique:docentes,sip,'.$idDocente,

            'anioinicialLicenciatura'  => 'integer|digits:4,'.Carbon::now()->year,
            'ultimoAnioLicenciatura'   => 'integer|digits:4,'.Carbon::now()->year,
            'situacionLicenciatura'=>'in:Titulado,Pasante,Créditos,Finalizado,S/E',

            'anioIniciaEstudiosMaestria'  => 'integer|digits:4,'.Carbon::now()->year,
            'ultimoAnioEstudiosMaestria'   => 'integer|digits:4,'.Carbon::now()->year,
            'situacionEstudiosMaestria'=>'in:Titulado,Pasante,Créditos,Finalizado,S/E',

            'anioiniciaestudiosDoctorado'  => 'integer|digits:4,'.Carbon::now()->year,
            'ultimoAnioEstudiosDoctorado'   => 'integer|digits:4,'.Carbon::now()->year,
            'situacionEstudiosDoctorado'=>'in:Titulado,Pasante,Créditos,Finalizado,S/E',


        ];
    }

}
