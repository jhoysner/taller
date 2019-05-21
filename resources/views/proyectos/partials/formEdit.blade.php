    <div class="row">
      
      <div class="form-group col-md-4">
        <label>Cliente</label>
        <div class="">
          <select name="cliente_id" id="" class="form-control" required="required">
            <option value="{{$proyecto->cliente_id}}"> {{ App\Proyecto::clienteNombreApellido($proyecto->cliente) }} </option>
            <option value="">------------------------------- </option>
            @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}">{{$cliente->nombre}}  {{$cliente->apellido}}</option>
            @endforeach
          </select>
        </div>
      </div>          

      <div class="form-group col-md-4">
        <label>Estado</label>
          <select name="estado" id="" class="form-control" required="required">
            <option value="{{$proyecto->estado}}">
             @if ($proyecto->estado)
               Terminado
             @else
               En Proceso
             @endif
            </option>
            <option value="">------------------------------- </option>
            <option value="0">En Proceso</option>
            <option value="1">Terminado</option>
          </select>
      </div>    
    </div>


    <div class="row">
      
      <div class="form-group col-md-4 ">
        <label>Vehiculo</label>
        <div class="">
          <select name="vehiculo" id="" class="form-control"  required="required">
            <option value="{{$proyecto->vehiculo}}"> {{ $proyecto->vehiculo }} </option>
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
          <input type="text" name="modelo" class="form-control" value="{{$proyecto->modelo}}" required="required">
        </div>
      </div>

      <div class="form-group col-md-4">
        <label>Placa</label>
        <input type="text" name="placa" class="form-control"  value="{{$proyecto->placa}}" required="required">
      </div>
      
      <div class="form-group col-md-12">
        <label>Descripcion</label>
        {{-- <input type="text" name="telefono" class="form-control" placeholder="Telefono"> --}}
        <textarea rows="4" name="descripcion" class="form-control" required="required">{{$proyecto->descripcion}}
        </textarea>
      </div>

      <div class="form-group col-md-4">
        <label>Fecha Inicio</label>
        <input type="date" name="fecha_inicio" class="form-control" value="{{$proyecto->fecha_inicio}}" required="required">

      </div>      
      <div class="form-group col-md-4">
        <label>Fecha Fin</label>
        <input type="date" name="fecha_fin" class="form-control" value="{{$proyecto->fecha_fin}}">

      </div>
    </div>
    <div class="container-fluid">
      <legend>Asignar Empleado      
      </legend>
        <a class="btn btn-info" data-toggle="modal" href="" data-target="#empleado">Agregar Empleado</a> 
           
        <table class="table" style="font-size: 1em">
            <thead>
              <th class="text-center">Nombre</th>
              <th class="text-center">Apellido</th>
              <th class="text-center"><i class="fa fa-cogs" aria-hidden="true"></i></th>
            </thead>
            <tbody>
             @foreach ($proyecto->EmpleadosProyecto as $element)
              <tr>

                <td class="text-center">{{$element->empleado->name}}</td>
                <td class="text-center">{{$element->empleado->cedula}}</td>
                <td class="text-center">

                    <div style="display: inline-block;">

                      <a class="btn btn-xs btn-danger delete" href="{{route('proyecto.empleado.delete',$element->id)}}">
                         <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </div>     
                </td>                     

              </tr>
              @endforeach
            </tbody>
        </table>
          
    </div>    
    
    <div class="container-fluid">
      <legend>Servicios  a Realizar       
      </legend>
        <a class="btn btn-success" data-toggle="modal" href="" data-target="#servicios">Agregar Servicio</a> 
           
        <table class="table" style="font-size: 1em">
            <thead>
              <th class="text-center">Nombre</th>
              <th class="text-center">Precio</th>
              <th class="text-center"><i class="fa fa-cogs" aria-hidden="true"></i></th>
            </thead>
            <tbody>
             @foreach ($proyecto->proyectoServicios as $element)
              <tr>

                <td class="text-center">{{$element->servicio->name}}</td>
                <td class="text-center">{{$element->servicio->price}}</td>
                <td class="text-center">

                    <div style="display: inline-block;">

                      <a class="btn btn-xs btn-danger delete" href="{{route('proyecto.servicio.delete',$element->id)}}">
                         <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </div>     
                </td>                     

              </tr>
              @endforeach
            </tbody>
        </table>
          
    </div>    

    <div class="container-fluid">
      <legend>Productos Usados       
      </legend>
        <a class="btn btn-default" data-toggle="modal" href="" data-target="#productos">Agregar Producto</a> 
           
        <table class="table" style="font-size: 1em">
            <thead>
              <th class="text-center">Nombre</th>
              <th class="text-center">Precio</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Monto</th>
              <th class="text-center"><i class="fa fa-cogs" aria-hidden="true"></i></th>
            </thead>
            <tbody>
             @foreach ($proyecto->proyectoProductos as $element)
              <tr>

                <td class="text-center">{{$element->producto->name}}</td>
                <td class="text-center">{{$element->producto->price}}</td>
                <td class="text-center">{{$element->qty}}</td>
                <td class="text-center">{{$element->monto}}</td>
                <td class="text-center">

                    <div style="display: inline-block;">

                      <a class="btn btn-xs btn-danger delete" href="{{route('proyecto.producto.delete',$element->id)}}">
                         <i class="fa fa-trash" aria-hidden="true"></i>
                      </a>
                    </div>     
                </td>                     

              </tr>
              @endforeach
            </tbody>
        </table>
          
    </div>
   



