<?php namespace PosgradoService\Entities;

use Illuminate\Support\Facades\DB;


class Docente extends Entity {



    protected $fillable = array('escuelaLugarIpn','extensionIpn','email2','web'
    ,'escuelaLicenciatura','localidadLicenciatura'
    ,'carreraLicenciatura','especialidadLicenciatura','situacionLicenciatura','anioinicialLicenciatura','ultimoanioLicenciatura'
    ,'tesisLicenciatura','examenLicenciatura','cedulaLicenciatura','observacionesLicenciatura'
    ,'escuelaMaestria','localidadMaestria'
    ,'carreraMaestria','especialidadMaestria','situacionMaestria','anioinicialMaestria','ultimoanioMaestria'
    ,'tesisMaestria','examenMaestria','cedulaMaestria','observacionesMaestria'
    ,'escuelaDoctorado','localidadDoctorado'
    ,'carreraDoctorado','especialidadDoctorado','situacionDoctorado','anioinicialDoctorado','ultimoanioDoctorado'
    ,'tesisDoctorado','examenDoctorado','cedulaDoctorado','observacionesDoctorado'
    ,'categoria','nivel','clavepresupuestal','ingresoIpn','numEmpleadoipn','numtarjetaescom','sip'
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
