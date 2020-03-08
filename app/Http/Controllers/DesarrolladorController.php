<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class DesarrolladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desarrolladors = App\Desarrollador::orderby('nombre','asc')->get();
        return view('desarrollador.index',compact('desarrolladors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desarrollador.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'idProyecto' => 'required'
        ]);

        App\Desarrollador::create($request->all());

        return redirect()->route('desarrollador.index')
                        ->with('exito','Se ha creado el desarrollador correctamente!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desarrollador = App\Desarrollador::findorfail($id); 
        return view('desarrollador.view', compact('desarrollador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desarrollador = App\Desarrollador::findorfail($id);
        return view('desarrollador.edit', compact('desarrollador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'idProyecto' => 'required'
        ]);

        $desarrollador = App\Desarrollador::findorfail($id);
        $desarrollador->update($request->all());

        return redirect()->route('desarrollador.index')
                         ->with('exito','Desarrollador modificado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Desarrollador  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desarrollador = App\Desarrollador::findorfail($id);

        $desarrollador->delete();

        return redirect()->route('desarrollador.index')
                         ->with('exito','Desarrollador eliminado correctamente!');
    }
}
