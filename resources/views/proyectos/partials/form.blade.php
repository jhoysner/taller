    <div class="row">
      
      <div class="form-group col-md-4">
        <label>Cliente</label>
        <div class="">
          {{-- <input type="text" name="nombre" class="form-control" placeholder="Nombre del Cliente"> --}}
          <select name="cliente_id" id="" class="form-control" required="required">
            <option> Selecciona un Cliente</option>
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->nombre}}  {{$cliente->apellido}}</option>
            @endforeach
          </select>
        </div>
      </div>    
    </div>
    <div class="row">
      
      <div class="form-group col-md-4 ">
        <label>Vehiculo</label>
        <div class="">
          <select name="vehiculo" id="" class="form-control"  required="required">
            <option> Selecciona un Vehiculo</option>
            <option value="Carro">Carro</option>
            <option value="Camion">Camion</option>
            <option value="Moto">Moto</option>
            <option value="Bus">Bus</option>
            <option value="otro">Otro</option>
          </select>
        </div>
      </div>    

      <div class="form-group col-md-4">
        <label>Modelo </label>
        <div class="">
          <input type="text" name="modelo" class="form-control" placeholder="Modelo" required="required">
        </div>
      </div>

      <div class="form-group col-md-4">
        <label>Placa</label>
        <input type="text" name="placa" class="form-control" placeholder="placa" required="required">
      </div>
      
      <div class="form-group col-md-12">
        <label>Descripcion</label>
        <textarea rows="4" name="descripcion" class="form-control" placeholder="Descripcion" required="required"></textarea>
      </div>      

      <div class="form-group col-md-4">
        <label>Fecha Inicio</label>
        <input type="date" name="fecha_inicio" class="form-control"  required="required">

      </div>

    
    </div>





