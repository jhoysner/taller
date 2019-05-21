@extends('layouts.llamada')

@section('content')
<div class="">
       

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Subiendo Imagen de Proyecto : {{$proyecto->cliente->nombre}} - {{$proyecto->vehiculo}} </h3>
          <br><br>
          <a class="btn btn-default pull-right" href="{{ url('proyectos') }}" role="button">Atras    
              <i class="fa fa-arrow-back"></i>
          </a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            
        <div class="formulario container-fluid">
            <div class="form-group col-md-12">
                <label for="">Subir Imagenes</label>
                <form action="{{url('subirimagenes/'.$proyecto->id)}}" class="dropzone" id="my-dropzone" >
                   {{ csrf_field() }}
                <div class="fallback">
                  <input name="file" type="file" multiple />
                  <input name="hidden" id="proyecto_key" type="text" name="proyecto" value="{{$proyecto->id}}" />
                </div>
                 </form>

            </div>

            <div class="col-md-12">
                @foreach($fotos as $photo)
                <div class="col-md-3">            
                    <div class="thumbnail">
                        <div class="caption">
                            <a href="{{ url('proyectos/imagenes/delete/'.$photo->id) }}>" class="btn btn-xs float-right btn-danger"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>
                        </div>
                        <a href="" class="img-card">
                          <img src="{{ asset('images/'.$photo->url) }}" alt="">
                        </a>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
           
        
        </div>
      </div>

    </section>
</div>
@endsection

@section('js')


@endsection