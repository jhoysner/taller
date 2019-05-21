<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\EmpleadoProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("listo");

        $empleados = Empleado::paginate(10);

        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado;
        $empleado->name = $request->nombre;
        $empleado->cedula = $request->cedula;
        $empleado->porciento = $request->porcentaje;
        $empleado->save();

        Session::flash('message','Empleado creado con exito');

        return redirect()->route('empleados.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);

        // dd($empleado);
        return view('empleados.edit', compact('empleado'));
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
        $empleado = Empleado::findOrFail($id);

        $empleado->name = $request->nombre;
        $empleado->cedula = $request->cedula;
        $empleado->porciento = $request->porcentaje;
        $empleado->save();


        Session::flash('message','Empleado actualizado con exito');
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        Session::flash('message','Empleado eliminado con exito');
        return redirect()->route('empleados.index');
    }


    public function proyectoEmpleado(Request $request)
    {
        // dd($request->all());

        $empleado = new EmpleadoProyecto;
        $empleado->proyecto_id = $request->proyecto;
        $empleado->empleado_id = $request->empleado;

        $empleado->save();
        
        return redirect()->route('proyectos.edit',$request->proyecto);

    }    

    public function proyectoEmpleadoDelete($id)
    {
        dd($request->all());

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
}
