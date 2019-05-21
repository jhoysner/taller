<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proyecto;
use App\ProyectoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(10);

        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->qty = $request->qty;
        $producto->save();

        Session::flash('message','Producto creado con exito');

        return redirect()->route('productos.index');
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
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
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
        $producto = Producto::findOrFail($id);

        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->qty = $request->qty;
        $producto->save();


        Session::flash('message','Producto actualizado con exito');
        return redirect()->route('productos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        Session::flash('message','Producto eliminado con exito');
        return redirect()->route('productos.index');
    }

    public function proyectoProductos(Request $request)
    {
        // dd("aqui");

        $proyecto_producto = new ProyectoProducto;

        $proyecto_producto->proyecto_id = $request->proyecto;
        $proyecto_producto->producto_id = $request->producto;
        $proyecto_producto->qty = $request->qty;

        $produto = Producto::findOrFail($request->producto);
        
        $proyecto_producto->monto = $produto->price * $request->qty;

        $proyecto_producto->save();

        $proyecto = Proyecto::findOrFail($proyecto_producto->proyecto_id);
        $proyecto->monto_producto = $proyecto->monto_producto + $proyecto_producto->monto;
        $proyecto->save();
        
        return redirect()->route('proyectos.edit',$request->proyecto);

    }  
    
    public function proyectoProductoDelete($id)
    {
        // dd($request->all());

        $proyecto_producto = ProyectoProducto::findOrFail($id);


        $proyecto_producto->delete();

        $proyecto = Proyecto::findOrFail($proyecto_producto->proyecto_id);

        $proyecto->monto_producto = 0;

        foreach ($proyecto->proyectoProductos as $value) {
            
            $proyecto->monto_producto = $proyecto->monto_producto + $value->monto;
        }

        $proyecto->save();

        return back();

    }
}
