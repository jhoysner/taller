<div class="modal fade bs-example-moda" tabindex="-1" id="productos" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content"> 
        <div class="modal-header">    
            <button type="button" id="btn-cerrar-zonas" class="close ocultar" data-dismiss="modal" aria-hidden="true">&times;</button> 
            <p style="font-size: 20px; " class="modal-title text-primary text-center"><b>Selecciona un Producto</b></p>
        </div>
    <center>
     <div class="container-fluid">     
      <form method="POST" action="{{route('proyectos.productos')}}"  class="form" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <select name="producto" class="form-control" style="width: 100%;">
                  @foreach ($productos as $producto)
                    <option value="{{$producto->id}}">{{$producto->name}}</option>
                  @endforeach
              </select>
            <input type="hidden" name="proyecto" value="{{$proyecto->id}}">  
        </div>      
        <div class="form-group">
            <input type="text" class="form-control" name="qty" placeholder="Cantidad usada" >
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
        </form>
     </div> 
    </center>
    </div>
  </div>
</div>