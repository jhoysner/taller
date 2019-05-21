<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Empleado;
use App\Producto;
use App\Proyecto;
use App\ProyectoImagen;
use App\ProyectoServicio;
use App\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        $proyectos = Proyecto::paginate(10);

        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();

        return view('proyectos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto;
        $proyecto->cliente_id = $request->cliente_id;
        $proyecto->vehiculo = $request->vehiculo;
        $proyecto->modelo = $request->modelo;
        $proyecto->placa = $request->placa;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->save();

        Session::flash('message','Proyecto creado con exito');

        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        return view('proyectos.view', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $clientes = Cliente::all();
        $servicios = Servicio::all();
        $productos = Producto::all();
        $empleados = Empleado::all();

        // dd($empleado);
        return view('proyectos.edit', compact('proyecto','clientes', 'servicios','productos','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $proyecto = Proyecto::findOrFail($id);

        $proyecto->cliente_id = $request->cliente_id;
        $proyecto->vehiculo = $request->vehiculo;
        $proyecto->modelo = $request->modelo;
        $proyecto->placa = $request->placa;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->estado = $request->estado;
        $proyecto->fecha_inicio = $request->fecha_inicio;
        $proyecto->fecha_fin = $request->fecha_fin;

        // foreach ($proyecto->proyectoServicios as $value) {
            
        //     $proyecto->monto = $proyecto->monto + $value->servicio->price;
        // }

        $proyecto->save();


        Session::flash('message','Proyecto actualizado con exito');
        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        Session::flash('message','Proyecto eliminado con exito');
        return redirect()->route('proyectos.index');
    }   

    public function proyectoServicios(Request $request)
    {
        // dd($request->all());

        $proyecto_servicio = new ProyectoServicio;
        $proyecto_servicio->proyecto_id = $request->proyecto;
        $proyecto_servicio->servicio_id = $request->servicios;

        $proyecto_servicio->save();

        $proyecto = Proyecto::findOrFail($proyecto_servicio->proyecto_id);
        $proyecto->monto_servicio = $proyecto->monto_servicio + $proyecto_servicio->servicio->price;
        $proyecto->save();
        
        return redirect()->route('proyectos.edit',$request->proyecto);

    }    

    public function proyectoServicioDelete($id)
    {
        // dd($request->all());

        $proyecto_servicio = ProyectoServicio::findOrFail($id);


        $proyecto_servicio->delete();

        $proyecto = Proyecto::findOrFail($proyecto_servicio->proyecto_id);

        $proyecto->monto_servicio = 0;

        foreach ($proyecto->proyectoServicios as $value) {
            
            $proyecto->monto_servicio = $proyecto->monto_servicio + $value->servicio->price;
        }

        $proyecto->save();

        return back();

    }

    public function proyectoPdf($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        // dd($proyecto->empleadosProyecto);

        $pdf = PDF::loadView('proyectos.pdf', compact('proyecto'));

        return $pdf->stream();
        // return view('proyectos.pdf', compact('proyecto'));
    }

    public function proyectoImage($id){
        
       $proyecto = Proyecto::findOrFail($id);
       $fotos = ProyectoImagen::where('proyecto_id', $id)->get();

       return view('proyectos.image', compact('proyecto', 'fotos'));
    }
}
