<?php

namespace Sigep\Http\Requests;

use Carbon\Carbon;
use Sigep\Http\Requests\Request;

class AddAlumnoRequest extends Request
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
        //que la fecha sea mayor de 18 años pero no mayor de 100 para el maximo
        $fechaMinCumple = Carbon::now()->subYears(100);
        $fechaMaxCumple = Carbon::now()->subYears(18);


        return [
            /*Campos User*/

            'name'                  =>'required|',
            'apellidoP'             =>'required|',
            'apellidoM'             =>'required|',
            'fechanac'              =>'required|date|after:'.$fechaMinCumple.'|before:'.$fechaMaxCumple,
            'nacionalidad'          =>'required|',
            'edoNacimiento'         =>'required|',
            'genero'                =>'required|in:Hombre,Mujer',
            'rfc'                   =>'required|unique:users,rfc',
            'curp'                  =>'required|unique:users,curp',
            'tipoIdOficial'         =>'required|in:ife,licenciaManejo,pasaporte,cartilla,cedula,docMigrat,certMatriConsul',
            'noIdOficial'           =>'unique:users,noIdOficial',
            'direccion'             =>'',
            'colonia'               => 'required_with:direccion',
            'ciudad'                => 'required_with:colonia',
            'estado'                => 'required_with:ciudad',
            'cp'                    => 'required_with:cp',
            'telefono'              =>'',
            'telMovil'              =>'',
            'edoCivil'              =>'',
            'numHijos'              =>'integer|min:0',
            'email'                 =>'required|email|unique:users,email',
            'password'              =>'required|',
            'boleta'                =>'required|unique:alumnos,boleta',
            /*campos Alumno*/
            'carrera'               => 'required|',
            'gradoDeEstudios'       =>'required|in:Licenciatura,Maestría,Doctorado',
            'situacionEstudios'     =>'required|in:Titulado,Pasante,Créditos,Finalizado',
            'califEstudios'         =>'required|numeric',
            'localidadEstudios'     =>'required|',
            'aniosEstudios'         =>'required|',
            'escuela'               =>'required|',
            'dependEconomic'        =>'',
            'viveCon'               =>'',
            'especialidadCarrera'   =>'',
            'observacionEstudios'   =>'',
            'empresaUltimoEmpleo'   =>'',
            'puestoCategUltimoEmpleo'=>'',
            'jefeInmediatoUltimoEmpleo'=>'',
            'telefonoUltimoEmpleo'=>'',
            'fechaIngresoUltimoEmpleo'=>'date',
            'fechaTerminoUltimoEmpleo'=>'date',
            'actividadesUltimoEmpleo'=>'',
            'motivosSeparacionUltimoEmpleo' =>'',
            'actividadesQueConoce'=>'',
            'conocimientoSoftware'=>'',
            'obsconocimientos'=>'',
            'ref1Nombre'=>'',
            'ref1Afinidad'=>'',
            'ref1Domicilio'=>'',
            'ref1Telefono'=>'',
            'ref1Tiempoconocerlo'=>'',
            'ref2Nombre'=>'',
            'ref2Afinidad'=>'',
            'ref2Domicilio'=>'',
            'ref2Telefono'=>'',
            'ref2Tiempoconocerlo'=>'',

        ];
    }
}

