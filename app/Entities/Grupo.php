<?php namespace PosgradoService\Entities;



use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Grupo extends Entity {

    protected $table = 'grupos';


    /**
     * @return Periodo
     */
    public function periodo()
    {
        return $this->belongsTo(Periodo::getClass());
    }





}
