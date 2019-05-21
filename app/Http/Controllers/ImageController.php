<?php

namespace App\Http\Controllers;

use App\ProyectoImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $photos = $request->file('file');
 
        if (!is_array($photos)) {
            $photos = [$photos];
        }
 
        if (!is_dir(public_path('/images'))) {
            mkdir(public_path('/images'));
        }
 
        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();
            // $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();
 
 
            $photo->move(public_path('/images'), $save_name);
 
            $upload = new ProyectoImagen();
            $upload->url = $save_name;
            $upload->proyecto_id = $id;
            $upload->save();
        }

        return  redirect('/proyectos/image/'.$id);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen  = ProyectoImagen::findOrFail($id);
            //$datos = Imagen::find($id);

        if(\File::exists(public_path().'/images/'.$imagen->url)){
            
            \File::delete(public_path().'/images/'.$imagen->url);

        } 
        $imagen->delete();
 
        return  redirect('/proyectos/image/'.$imagen->proyecto_id)->with('message','Imagen eliminada');
    }

}
