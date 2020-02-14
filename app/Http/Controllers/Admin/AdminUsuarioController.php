<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Usuario;

class AdminUsuarioController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = Usuario::all();

        $argumentos = array();
        $argumentos['usuarios'] = $usuarios;

        return view('admin.usuarios.index', $argumentos);
    }

    public function create()
    {
        return view('admin.usuarios.create');
    }

    public function store(Request $request)
    {
        // where(columna, valor)
        //first ecuetra el primer registro que coincida, si no encuentra regresa NULL
        $verification = Usuario::where('email', $request->input('txtEmail'))->first();

        if($verification) {
            return redirect()->
                route('usuarios.create')->
                with('error','el correo ya existe ');
        }

        $usuario = new Usuario();

        $usuario->name = $request->input('txtName');
        $usuario->email = $request->input('txtEmail');
        $usuario->password = bcrypt($request->input('txtPassword'));

        if($usuario->save()) {
           
            return redirect()->
                route('usuarios.index')->
                with('exito','El usuario fue añadido correctamente');
        }

        
        return redirect()->route('usuarios.index')->
            with('error','No se pudo guardar ');           
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            $argumentos= array();
            $argumentos['usuario'] = $usuario;
            
            return view('admin.usuarios.show', $argumentos);
        }

        return redirect()-> 
            route('usuarios.index')-> 
            with('error', 'No se econtró al usuario');
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            $argumentos= array();
            $argumentos['usuario'] = $usuario;
            
            return view('admin.usuarios.edit', $argumentos);
        }

        return redirect()-> 
            route('usuarios.index')-> 
            with('error', 'No se econtró al usuario');
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            $usuario->name = $request->input('txtName');
            $usuario->email = $request->input('txtEmail');
            $usuario->password = bcrypt($request->input('txtPassword'));

            if($usuario->save()) {
                return redirect()->
                    route('usuarios.edit', $id)->
                    with('exito', 'El usuario se actualizó exitosamente');
            }

            return redirect()->
                    route('usuarios.edit', $id)->
                    with('error', 'No se pudo actualizar al usuario');
        }

        return redirect()->
            route('usuarios.index')->
            with('error', 'No se econtró al usuario');
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if($usuario) {
            if($usuario->delete()) {
                return redirect()->
                    route('usuarios.index', $id)->
                    with('exito', 'El usuario se eliminó exitosamente');
            }

            return redirect()->
                    route('usuarios.index', $id)->
                    with('error', 'No se pudo eliminar al usuario');
        }

        return redirect()->
            route('usuarios.index')->
            with('error', 'No se pudo eliminar al usuario');
    }
}
