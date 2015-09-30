<?php namespace PosgradoService\Entities;



use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AsignaturaGrupo extends Entity {



    protected $fillable = array('docente_id','grupo_id','acta','asignatura_id','horaDias_id');

    protected $table = 'asignatura_grupo';

    /**
     * @return horarios
     */
    public function horarios()
    {
        return $this->hasMany(Horario::getClass());
    }

    /**
     * @return Docente
     */
    public function docente()
    {
        return $this->belongsTo(Docente::getClass());
    }

    /**
     * @return Asignatura
     */
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::getClass());
    }

    /**
     * @return Grupo
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::getClass());
    }

    /**
     * @return Inscripcion
     */
    public function inscripciones()
    {
        return $this->belongsTo(Inscripcion::getClass());
    }

    public static function asignaturaGrupoPorPeriodo()
    {

        $hoy=Carbon::now()->toDateString();
        $grupos = DB::table('asignatura_grupo')
            ->join('grupos','grupos.id',"=","asignatura_grupo.grupo_id")
            ->join('periodos','periodos.id','=','grupos.periodo_id')
            ->select('asignatura_grupo.id as asignaturaGrupo_id','grupos.periodo_id','grupos.semestre as semestre','grupos.id as id','grupos.nombre as nombre','grupos.salon as salon','periodos.nombre as periodoNombre')
            ->where('periodos.finPeriodo','>',$hoy)
            ->get();

        return $grupos;

    }



}
