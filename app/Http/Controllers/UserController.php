<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Database\QueryException;
use App\Role;
use App\Http\Requests\PasswordRequest;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=User::with("roles")->orderBy('name')->paginate(10);
        $roles=Role::orderBy('name')->get();
        return view('panel.usuarios.index', compact('usuarios','roles'));
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
    public function store(UserRequest $request)
    {
        try{
            $user = User::create($request->except('idRol'));
            $user->roles()->attach($request->idRol);
            return redirect('usuarios')->with('success','Usuario creado');
        }catch(Exception | QueryException $e){
            return back()->withErrors(['exception'=>$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$usuario = User::with("roles")->where('id', $id)->orderBy('name')->firstOrFail();
        $usuario=User::with(['roles' => function ($query) {
            $query->select('display_name');
        }])->findOrFail($id);
        return view("panel.usuarios.show",compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //no se pone nada porque el edit se muestra en un modal
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            //$user->name=$request->name;
            //$user->save();
            $user->roles()->sync($request->idRol);
            return redirect('usuarios')->with('success', 'Usuario actualizado');
        } catch (Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function settings()
    {
        $usuario = Auth::user();
        return view('panel.usuarios.settings', compact('usuario'));
    }

    public function change_password(PasswordRequest $request)
    {
        try {
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('settings')->with('success', 'Contraseña actualizada');
        } catch (Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

}
