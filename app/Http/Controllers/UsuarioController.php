<?php

namespace App\Http\Controllers;

use App\Events\NuevoUsuarioEvent;
use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios  = "";
        if (!empty($request->buscar)) {
            $usuarios = Usuario::with('categoria')
            ->where('nombres', 'like', '%'.$request->buscar.'%')
            ->Orwhere('apellidos', 'like', '%'.$request->buscar.'%')
            ->Orwhere('cedula', 'like', '%'.$request->buscar.'%')
            ->Orwhere('pais', 'like', '%'.$request->buscar.'%')
            ->Orwhere('email', 'like', '%'.$request->buscar.'%')
            ->Orwhere('direccion', 'like', '%'.$request->buscar.'%')
            ->Orwhere('celular', 'like', '%'.$request->buscar.'%')
            ->get();
        } else {
            $usuarios = Usuario::with('categoria')->get();
        }

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::all();
        return view('usuarios.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->id_categoria = $request->id_categoria;
        $usuario->nombres = $request->nombre;
        $usuario->apellidos = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->pais = $request->pais;
        $usuario->email = $request->email;
        $usuario->direccion = $request->direccion;
        $usuario->celular = $request->celular;
        if ($usuario->save()) {
            $usuariosPorPais = Usuario::usuariosPorPais();
            event(new NuevoUsuarioEvent($usuariosPorPais, $usuario));
            return redirect()->route('usuario.index')->with(['type' => 'info', 'message' => 'El usuario fue registrdo con exito!']);
        } else {
            return redirect()->back()->with(['type' => 'danger', 'message' => 'Error al registrar el usuario']);
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        $categorias = Categoria::all();
        return view('usuarios.edit', compact('usuario', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->id_categoria = $request->id_categoria;
        $usuario->nombres = $request->nombre;
        $usuario->apellidos = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->pais = $request->pais;
        $usuario->email = $request->email;
        $usuario->direccion = $request->direccion;
        $usuario->celular = $request->celular;
        if ($usuario->save()) {
            return redirect()->route('usuario.index')->with(['type' => 'info', 'message' => 'El usuario fue actualizado con exito!']);
        } else {
            return redirect()->back()->with(['type' => 'danger', 'message' => 'Error al actualizar el usuario el usuario']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if ($usuario->delete()) {
            return redirect()->route('usuario.index')->with(['type' => 'info', 'message' => 'El usuario fue eliminado con exito!']);
        } else {
            return redirect()->back()->with(['type' => 'danger', 'message' => 'Error al eliminar el usuario el usuario']);
        }
    }
}
