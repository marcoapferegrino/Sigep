<?php namespace PosgradoService\Entities;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Grupo extends Entity {

    protected $fillable = array( 'nombre','salon','semestre', 'periodo_id' );

    protected $table = 'grupos';



    /**
     * @return Periodo
     */
    public function periodo()
    {
        return $this->belongsTo(Periodo::getClass());
    }

    /**
     * @return AsignaturaGrupo
     */
    public function asignaturasGrupo()
    {
        return $this->hasMany(AsignaturaGrupo::getClass());
    }


    public static function gruposActuales()
    {
        $hoy=Carbon::now()->toDateString();
        $grupos = DB::table('grupos')
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->select('grupos.id as grupoId','grupos.nombre as grupoNombre','periodos.nombre as periodoNombre')
            ->where('periodos.finPeriodo','<',$hoy)
            ->get();

        return $grupos;

    }

    public static function grupoBien($idGrupo)
    {


        $asignaturasGrupo = $grupos = DB::table('asignatura_grupo')
            ->join('asignaturas','asignaturas.id','=','asignatura_grupo.asignatura_id')
            ->join('docentes','docentes.id','=','asignatura_grupo.docente_id')
            ->join('users','users.docente_id','=','docentes.id')
            ->where('asignatura_grupo.grupo_id',$idGrupo)
            ->select('asignatura_grupo.id','asignatura_grupo.grupo_id','asignaturas.nombre as asignaturaNombre','users.name as docenteNombre','users.apellidoP','users.apellidoM')
            ->get();
        return $asignaturasGrupo;
    }



}
