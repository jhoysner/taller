@extends('layouts.llamada')

@section('content')
<div class="">
    <div class="">
       

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Clientes</h3>
          <br><br>
          <a class="btn btn-info pull-left" href="{{ url('clientes/create') }}" role="button">Agregar Cliente    
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
                <th class="text-center">NOMBRE</th>
                <th class="text-center">APELLIDO</th>
                <th class="text-center">CEDULA</th>
                <th class="text-center">Telefono</th>
                <th class="text-center"><i class="fa fa-cogs" aria-hidden="true"></i></th>
              </thead>
              <tbody>
                @foreach($clientes as $data)
                <tr>
                  <td class="text-center">{{ $data->id }}</td>
                  <td class="text-center">{{ $data->nombre }}</td>
                  <td class="text-center">{{ $data->apellido }}</td>
                  <td class="text-center">{{ $data->cedula }}</td>
                  <td class="text-center">{{ $data->telefono }}</td>

                  <td class="text-center">
                      {{-- <a href="#" class="btn btn-primary btn-xs "><i class="fa fa-file-text-o" ></i></a>   --}}
                      <a href="{{ url('/clientes/'.$data->id.'/edit')}}" class="btn btn-warning btn-xs">
                              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </a>     
                      <div style="display: inline-block;">
                         <form action="{{ route('clientes.destroy',$data->id )}}" method="POST">
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
            <center>
                {{ $clientes->links() }}
            </center>
        
        </div>
  
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
</div>
@endsection
