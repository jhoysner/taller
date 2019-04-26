<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoServicio extends Model
{
    protected $table = 'proyecto_servicio';

    protected $fillable = ['proyecto_id', 'servicio_id'];

    public function proyecto(){
        return $this->belongsTo('App\Proyecto');
    }        

    public function servicio(){
        return $this->belongsTo('App\Servicio');
    }    
}
