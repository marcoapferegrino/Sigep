<?php

namespace PosgradoService\Http\Requests;

use Carbon\Carbon;
use PosgradoService\Http\Requests\Request;

class CreateDocenteRequest extends Request {


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
    public function rules()
    {

        $fechaMinCumple = Carbon::now()->subYears(100);
        $fechaMaxCumple = Carbon::now()->subYears(18);


        return [
            'status'                   => 'required | in:activo,licencia,con goce de sueldo,cambios de adscripción,semestre sabatico,año sabático,otro', //>> luis
            'name'                     => 'required | ',
            'apellidoP'                => 'required | ',
            'apellidoM'                => 'required | ',
            'fechanac'                 => 'required|date|after:'.$fechaMinCumple.'|before:'.$fechaMaxCumple,
            'password'                 => 'required| ',
            'nacionalidad'             => 'required | ',
            'edoNacimiento'            => 'required | ',
            'genero'                   => 'required | in:Hombre,Mujer ',
            'rfc'                      => 'required | ',
            'curp'                     => 'required | ',
            'noIdOficial'              => 'required|unique:users,noIdOficial',
            'escuelaLugarIpn'          => 'required | ',
            'tipoIdOficial'            =>'required|in:ife,cartilla,pasaporte,licenciaManejo',
            'email'                    =>'required|email|unique:users,email',
            'direccion'                => 'required | ',
            'colonia'                  => 'required | ',
            'ciudad'                   => 'required | ',
            'estado'                   => 'required | ',
            'cp'                       => 'required | integer',


            'telefono'=>'required|',
            'telMovil' =>'required|',
            'edoCivil' =>'required|',
            'numHijos'=>'required|integer|min:0',

            'escuelaLicenciatura'      => 'required | string  ',
            'localidadLicenciatura'    => 'required | string ',
            'carreraLicenciatura'      => 'required | string ',
            'situacionLicenciatura'    => 'required | in:titulado,pasante,creditos finalizados ',

            'anioinicialLicenciatura'  => 'required | string ',
            'ultimoAnioLicenciatura'   => 'required | string ',
            'tesisLicenciatura'        => 'required | string ',
            'examenLicenciatura'       => 'required | string ',
            'cedulaLicenciatura'       => 'required | string ',



            'escuelaMaestria'          => 'required | string ',
            'localidadMaestria'        => 'required | string ',
            'carreraMaestria'          => 'required | string ',
            'especialidadMaestria'     => 'required | string ',
            'situacionMaestria'        => 'required | in:titulado,pasante,creditos finalizados  ',
            'anioinicialMaestria'      => 'required | string ',
            'ultimoanioMaestria'       => 'required | string ',
            'tesisMaestria'            => 'required | string ',
            'examenMaestria'           => 'required | string ',
            'cedulaMaestria'           => 'required | string ',
            'observacionesMaestria'    => 'required | string ',


            'escuelaDoctorado'         => 'required | string ',
            'localidadDoctorado'       => 'required | string ',
            'carreraDoctorado'         => 'required | string ',
            'especialidadDoctorado'    => 'required | string ',
            'situacionDoctorado'       => 'required | in:titulado,pasante,creditos finalizados  ',
            'anioinicialDoctorado'     => 'required | string ',
            'ultimoanioDoctorado'      => 'required | string ',
            'tesisDoctorado'           => 'required | string ',
            'examenDoctorado'          => 'required | string ',
            'cedulaDoctorado'          => 'required | string ',
            'observacionesDoctorado'   => 'required | string ',


            'nivel'                    => 'required | string ',
            'clavePresupuestal'        => 'required | string ',
            'ingresoIpn'               => 'required |',
            'numEmpleado'              => 'required | ',
            'sip'                      => 'required | ',

        ];
    }

}
