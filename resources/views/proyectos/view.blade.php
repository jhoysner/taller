@extends('layouts.llamada')

@section('content')
       
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Información de Proyecto</h3>
          <br><br>
          <a class="btn btn-default pull-right" href="{{ url('proyectos') }}" role="button">     
            <i class="fa fa-arrow-left"></i>
            Atras    
          </a>
          <a class="btn btn-default pull-left" href="{{ route('proyecto.pdf',$proyecto->id )}}" role="button">     
            <i class="fa fa-file"></i>
            Generar Pdf    
          </a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            
        <div class="formulario container-fluid">

          <div class="container-fluid" >
              <div class="col-md-6">
                  <label>Cliente</label>
                  <p>{{App\Proyecto::clienteNombreApellido($proyecto->cliente) }}</p>
                  <hr>
                  <label>Vehiculo</label><br>
                  <p>{{$proyecto->vehiculo}}</p>
                  <hr>

                  <label>Modelo</label>
                  <p>{{$proyecto->modelo}}</p>    
                  <hr>

                  <label>Fecha Fin</label>
                  <p>{{$proyecto->fecha_fin}}</p>    
                  <hr>

              </div>
              <div class="col-md-6">
                  <label>Estado</label>
                  <p>
                   @if ($proyecto->estado == 0)
                     <span class="badge">
                       En proceso 
                     </span>
                    @else 
                     <span class="badge">
                      Terminado
                     </span>
                    @endif
                  </p>
                  <hr>
                  <label>Placa</label>
                  <p>{{$proyecto->placa}}</p>
                  <hr>

                  <label>Fecha Inicio</label><br>
                  <p>{{$proyecto->fecha_inicio}}</p>                      

                  <hr>

              </div>
              <div class="col-md-12">
                  <label>Descripcion</label><br>
                  <p>
                    {{$proyecto->descripcion}}
                  </p>
                  <hr>

              </div>
              <div class="col-md-12">
                 <legend><b>Empleado </b> </legend>
                  <table class="table table-bordered" style="font-size: 1em">
                      <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Cedula</th>
                      </thead>
                      <tbody>
                       @foreach ($proyecto->empleadosProyecto as $element)
                        <tr>

                          <td class="text-center">{{$element->empleado->name}}</td>
                          <td class="text-center">{{$element->empleado->cedula}}</td>
            
                          </td>                     

                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>              
              <div class="col-md-12">
                 <legend><b>Servicios </b> </legend>
                  <table class="table table-bordered" style="font-size: 1em">
                      <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Monto</th>
                      </thead>
                      <tbody>
                       @foreach ($proyecto->proyectoServicios as $element)
                        <tr>

                          <td class="text-center">{{$element->servicio->name}}</td>
                          <td class="text-center">{{$element->servicio->price}} Bfs</td>
            
                          </td>                     

                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot> 
                        <tr bgcolor="#9e9e9ed6"> 
                          <th colspan="1" class="text-center">Total</th> 
                          <td  class="text-center">{{$proyecto->monto_servicio}} Bfs</td> 
                        </tr> 
                      </tfoot>
                  </table>
              </div>              
              <div class="col-md-12">
                 <legend><b>Producto </b> </legend>
                  <table class="table table-bordered" style="font-size: 1em">
                      <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Cantida</th>
                        <th class="text-center">Monto</th>
                      </thead>
                      <tbody>
                       @foreach ($proyecto->proyectoProductos as $element)
                        <tr>

                          <td class="text-center">{{$element->producto->name}}</td>
                          <td class="text-center">{{$element->qty}}</td>
                          <td class="text-center">{{$element->monto}} Bfs</td>
            
                          </td>                     

                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot> 
                        <tr bgcolor="#9e9e9ed6"> 
                          <th colspan="2" class="text-center">Total</th> 
                          <td  class="text-center">{{$proyecto->monto_producto}} Bfs</td> 
                        </tr> 
                      </tfoot>
                  </table>
              </div>
        </div>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
