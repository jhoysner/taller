
    <div class="form-group">
      <label>Nombre del Empleado</label>
      <div class="">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre del empleado" maxlength="30" value="{{$empleado->name}}">
      </div>
    </div>

    <div class="form-group">
      <label>Cedula</label>
      <input type="text" name="cedula" class="form-control" placeholder="cedula" maxlength="30"  value="{{$empleado->cedula}}">
    </div>
    
    <div class="form-group">
      <label>Porcentaje de Ganancia</label>
      <input type="text" name="porcentaje" class="form-control" placeholder="porcentaje" value="{{$empleado->porciento}}">
    </div>
    

