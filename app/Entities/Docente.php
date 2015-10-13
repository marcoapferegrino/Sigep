<?php namespace Sigep\Entities;

use Illuminate\Support\Facades\DB;


class Docente extends Entity {



    protected $fillable = array('escuelaLugarIpn','extensionIpn','email2','web','status'
    ,'escuelaLicenciatura','localidadLicenciatura','observacionesDocente'
    ,'carreraLicenciatura','especialidadLicenciatura','situacionLicenciatura','anioinicialLicenciatura','ultimoAnioLicenciatura'
    ,'tesisLicenciatura','examenLicenciatura','cedulaLicenciatura','observacionesLicenciatura'
    ,'escuelaMaestria','localidadMaestria'
    ,'carreraMaestria','especialidadMaestria','situacionEstudiosMaestria','anioIniciaEstudiosMaestria','ultimoAnioEstudiosMaestria'
    ,'tesisMaestria','examenMaestria','cedulaMaestria','observacionesMaestria'
    ,'escuelaDoctorado','localidadDoctorado'
    ,'carreraDoctorado','especialidadDoctorado','situacionEstudiosDoctorado','anioiniciaestudiosDoctorado','ultimoAnioEstudiosDoctorado'
    ,'tesisDoctorado','examenDoctorado','cedulaDoctorado','observacionesDoctorado'
    ,'categoria','nivel','clavePresupuestal','ingresoIpn','numEmpleado','numTarjetaEscom','sip'
    ,'idUsuarioActualiza','tutor_id'
    );
    protected $table = 'docentes';

    /**
     * Regresa el usuario principal
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::getClass());
    }


    /**
     * @return Tutor
     */
    public function tutor(){

        return $this->hasMany(Tutor::getClass());
    }

    /**
     * @return AsignaturaGrupo
     */
    public function asignaturasGrupo()
    {
        return $this->hasMany(AsignaturaGrupo::getClass());
    }





}
