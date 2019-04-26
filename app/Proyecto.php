<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $fillable = [
        'vehiculo', 'modelo', 'placa','descripcion','cliente_id','estado' ,'fecha_inicio','fecha_fin',
    ];

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }    

    public static function clienteNombreApellido($cliente){
        
      return $cliente->nombre.' '.$cliente->apellido;
    }


    public function proyectoServicios(){
        return $this->hasMany('App\ProyectoServicio');
    }   

    public function proyectoProductos(){
        return $this->hasMany('App\ProyectoProducto');
    }    
    public function empleadosProyecto(){
        return $this->hasMany('App\EmpleadoProyecto');
    }
}
