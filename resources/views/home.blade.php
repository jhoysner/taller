@extends('layouts.llamada')

@section('content')
<div class="">
    <div class="">
       
{{--          <section class="content-header">
      <h1>
        Pagina Principal
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section> --}}

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard Principal</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> --}}
              {{-- <i class="fa fa-times"></i></button> --}}
          </div>
        </div>
        <div class="box-body">
        
            <h3 class="text-center">Bienvenido al sistema</h3>
           
        
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
