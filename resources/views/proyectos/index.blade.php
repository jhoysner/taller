@extends('layouts.llamada')

@section('content')
<div class="">
    <div class="">
       

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Proyectos</h3>
          <br><br>
          <a class="btn btn-info pull-left" href="{{ url('proyectos/create') }}" role="button">Nuevo Proyecto    
              <i class="fa fa-plus"></i>
          </a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            
            <table class="table" id="tabla">
              <thead>
                <th class="text-center">ID</th>
                <th class="text-center">Vehiculo</th>
                <th class="text-center">Placa</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Ingreso</th>
                <th class="text-center">Estado</th>
                <th class="text-center"><i class="fa fa-cogs" aria-hidden="true"></i></th>
              </thead>
              <tbody>
                @foreach($proyectos as $data)
                <tr>
                  <td class="text-center">{{ $data->id }}</td>
                  <td class="text-center">{{ $data->vehiculo }}</td>
                  <td class="text-center">{{ $data->placa }}</td>
                  <td class="text-center">{{ App\Proyecto::clienteNombreApellido($data->cliente) }}</td>
                  <td class="text-center">{{ $data->fecha_inicio }}</td>
                  <td class="text-center">
                    @if ($data->estado == 0)
                     <span class="badge">
                       En proceso 
                     </span>
                    @else 
                     <span class="badge">
                      Terminado
                     </span>
                    @endif

                  </td>

                  <td class="text-center">
                      <a href="{{ url('/proyectos/'.$data->id)}}" class="btn btn-primary btn-xs "><i class="fa fa-file-text-o" ></i></a>  
                      <a href="{{ url('/proyectos/'.$data->id.'/edit')}}" class="btn btn-warning btn-xs">
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </a>     
                      <div style="display: inline-block;">
                         <form action="{{ route('proyectos.destroy',$data->id )}}" method="POST">
                                {{ csrf_field() }}
                                {!! method_field('DELETE') !!}

                           <button type="submit" class="btn btn-xs btn-danger delete" >
                            <i class="fa fa-trash" aria-hidden="true"></i>
                           </button>
                        </form>
                      </div>     
                  </td>                     

                </tr>
                @endforeach
              </tbody>
            </table>
           
        
        </div>
        <!-- /.box-body -->
{{--         <div class="box-footer">
          Footer
        </div> --}}
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
</div>
@endsection
