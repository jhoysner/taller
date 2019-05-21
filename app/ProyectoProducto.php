<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoProducto extends Model
{
    protected $table = 'proyecto_producto';

    protected $fillable = ['proyecto_id', 'producto_id'];

    public function proyecto(){
        return $this->belongsTo('App\Proyecto');
    }        

    public function producto(){
        return $this->belongsTo('App\Producto');
    }    
}
