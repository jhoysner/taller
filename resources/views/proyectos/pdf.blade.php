<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
   .container{
     padding: 2em;
   }
   table{
    border: 1px solid #f4f4f4;
    width:100%;
   }
   .thead{
      font-size: 1em;
      font-weight: bold;
   }
   td{
        border: 1px solid #f4f4f4;
        padding:10px;
   }
   tr{
        padding:10px;
   }

  </style>
</head>
<body>


      <h3 class="box-title text-center">
        <center>
          INFORMACION DEL PROYECTO
        <center>
      </h3>
        

        <div class="container" >
          
            <p> <strong>Cliente: </strong>{{App\Proyecto::clienteNombreApellido($proyecto->cliente) }}</p>
            <p> <strong>Vehiculo: </strong>{{$proyecto->vehiculo}}</p>
            <p> <strong>Modelo: </strong>{{$proyecto->modelo}}</p>    
            <p> <strong>Placa: </strong>{{$proyecto->placa}}</p>    
            <p> <strong>Inicio: </strong>{{$proyecto->fecha_inicio}}</p>    
            <p> <strong>Final: </strong>{{$proyecto->fecha_fin}}</p>    
            <p> <strong>Descripcion: </strong>{{$proyecto->descripcion}}</p>    
  

  {{--           <div class="col-md-12">
               <h3><b>Empleado </b> </g3>
                <table>
                  <tr class="thead">
                    <td>Nombre</td>
                    <td>Cedula</td>
                  </tr>
                      @foreach ($proyecto->empleadosProyecto as $element)
                      <tr>
                        <td class="text-center">{{$element->empleado->name}}</td>
                        <td class="text-center">{{$element->empleado->cedula}}</td>
          
                        </td>                     
                      </tr>
                      @endforeach
                </table>
            </div>   --}}            
              <hr class="hrFecha br-black-1" style="margin-bottom: 0px;">
              <div class="col-md-12">
                 <h3><b>SERVICIOS </b> </h3>
                  <table>
                      <tr class="thead">
                        <td>Nombre</td>
                        <td>Monto</td>
                      </tr>
                       @foreach ($proyecto->proyectoServicios as $element)
                        <tr>

                          <td class="text-center">{{$element->servicio->name}}</td>
                          <td class="text-center">{{$element->servicio->price}} Bfs</td>
            
                        </tr>
                        @endforeach
                        <tr bgcolor="#9e9e9ed6"> 
                          <td colspan="1" class="text-center">Total</td> 
                          <td  class="text-center">{{$proyecto->monto_servicio}} Bfs</td> 
                        </tr> 
                  </table>
              </div>              
              <hr class="hrFecha br-black-1" style="margin-bottom: 0px;">

              <div class="col-md-12">
                 <h3><b>PRODUCTOS </b> </h3>
                  <table>
                      <tr class="thead">
                        <th>Nombre</th>
                        <th>Cantida</th>
                        <th>Monto</th>
                      </tr>
                      <tbody>
                       @foreach ($proyecto->proyectoProductos as $element)
                        <tr>

                          <td class="text-center">{{$element->producto->name}}</td>
                          <td class="text-center">{{$element->qty}}</td>
                          <td class="text-center">{{$element->monto}} Bfs</td>
          
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot> 
                        <tr bgcolor="#9e9e9ed6"> 
                          <td colspan="2" class="text-center">Total</td> 
                          <td  class="text-center">{{$proyecto->monto_producto}} Bfs</td> 
                        </tr> 
                      </tfoot>
                  </table>
              </div>
        </div>
      <!-- /.box -->

    {{-- @yield('contenido') --}}
{{--     <div style="margin-top: 160px; font-size: 17px;">
      <center>
        _____________________ <br>
        Copyright © 2019 AdminTaller. Todos los Derechos Reservados   <br>
      </center>
    </div> --}}
    <hr class="hrFecha br-black-1" style="margin-bottom: 0px;">

</body>
</html>
