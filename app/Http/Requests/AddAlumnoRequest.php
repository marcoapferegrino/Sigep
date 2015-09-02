<?php

namespace PosgradoService\Http\Requests;

use Carbon\Carbon;
use PosgradoService\Http\Requests\Request;

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

            'name'=>'required|',
            'apellidoP'=>'required|',
            'apellidoM'=>'required|',
            'fechanac'=>'required|date|after:'.$fechaMinCumple.'|before:'.$fechaMaxCumple,
            'nacionalidad'=>'required|',
            'edoNacimiento' =>'required|',
            'genero' =>'required|in:Hombre,Mujer',
            'rfc' =>'required|unique:users,rfc',
            'curp' =>'required|unique:users,curp',
            'tipoIdOficial'=>'required|in:ife,licenciaManejo,pasaporte,cartilla,cedula,docMigrat,certMatriConsul',
            'noIdOficial' =>'required|unique:users,noIdOficial',
            'direccion'=>'required|',
            'colonia' =>'required|',
            'ciudad' =>'required|',
            'estado'=>'required|',
            'cp'=>'required|',
            'telefono'=>'required|',
            'telMovil' =>'required|',
            'edoCivil' =>'required|',
            'numHijos'=>'required|integer|min:0',
            'email' =>'required|email|unique:users,email',
            'password'=>'required|',
            /*campos Alumno*/
            'status'=>'required|',
          'dependEconomic'=>'required|',
          'viveCon'=>'required|',
          'gradoDeEstudios'=>'required|in:Licenciatura,Maestria,Doctorado',
          'situacionEstudios'=>'required|',
          'califEstudios'=>'required',
          'localidadEstudios'=>'required|',
          'aniosEstudios'=>'required|',
          'escuela'=>'required|',
          'especialidadCarrera'=>'required|',
          //'retomarEstudios'=>'required|',
          'observacionEstudios'=>'required|',
          'empresaUltimoEmpleo'=>'required|',
          'puestoCategUltimoEmpleo'=>'required|',
          'jefeInmediatoUltimoEmpleo'=>'required|',
          'telefonoUltimoEmpleo'=>'required|',
          'fechaIngresoUltimoEmpleo'=>'required|date',
          'fechaTerminoUltimoEmpleo'=>'required|date',
          'actividadesUltimoEmpleo'=>'required|',
          'motivosSeparacionUltimoEmpleo' =>'required|',
          //'tiempoEnRamoConstruccion'=>'required|',
          'actividadesQueConoce'=>'required|',
//          'conocimientoHerramientasConstru'=>'required|',
//          'conocimientoherramientasadmin'=>'required|',
          'conocimientoSoftware'=>'required|',
          'obsconocimientos'=>'required|',
          'ref1Nombre'=>'required|',
          'ref1Afinidad'=>'required|',
          'ref1Domicilio'=>'required|',
          'ref1Telefono'=>'required|',
          'ref1Tiempoconocerlo'=>'required|',
          'ref2Nombre'=>'required|',
          'ref2Afinidad'=>'required|',
          'ref2Domicilio'=>'required|',
          'ref2Telefono'=>'required|',
          'ref2Tiempoconocerlo'=>'required|',

        ];
    }
}

