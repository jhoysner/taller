<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoProyecto extends Model
{
    protected $table = 'empleado_proyecto';

    protected $fillable = ['proyecto_id', 'empleado_id'];

    public function proyecto(){
        return $this->belongsTo('App\Proyecto');
    }        

    public function empleado(){
        return $this->belongsTo('App\Empleado');
    }    
}
