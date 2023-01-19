<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCategoriaRequest  $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;       
        if ($categoria->save()) {
            return redirect()->route('categoria.index')->with(['type' => 'info', 'message' => 'Exito, el registro fue guardado correctamente']);
        } else {
            return redirect()->route('categoria.index')->with(['type' => 'danger', 'message' => 'Error, el registro fue guardado incorrectamente']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriaRequest  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriaRequest $request,  $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;       
        if ($categoria->save()) {
            return redirect()->route('categoria.index')->with(['type' => 'info', 'message' => 'Exito, el registro fue actualizado correctamente']);
        } else {
            return redirect()->route('categoria.index')->with(['type' => 'danger', 'message' => 'Error al actualizar registro']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria->delete()) {
            return redirect()->route('categoria.index')->with(['type' => 'info', 'message' => 'Exito, el registro fue eliminado correctamente']);
        } else {
            return redirect()->route('categoria.index')->with(['type' => 'danger', 'message' => 'Error al eliminar registro']);
        }
    }
    
}
