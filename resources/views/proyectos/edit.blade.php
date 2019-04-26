@extends('layouts.llamada')

@section('content')
<div class="">
       

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editando Proyecto</h3>
          <br><br>
          <a class="btn btn-default pull-right" href="{{ url('proyectos') }}" role="button">    <i class="fa fa-arrow-left"></i>
              Atras    
          </a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            
        <div class="formulario container-fluid">
          <form action="{{url('proyectos/'.$proyecto->id)}}" method="POST"  class="form">
          {{ csrf_field()  }}
          {!! method_field('PUT') !!}

              <fieldset>
                @include('proyectos.partials.formEdit')
              <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary" style="float:right">
            </div>
          </fieldset>
          </form>
        </div>
           
        
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
@endsection

@include('modal.servicios')
@include('modal.productos')
@include('modal.empleado')
