<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jefe;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function iniciarSesion(Request $request)
    {

        $usuario = $request->post('correo');
        $password = $request->post('password');

        $jefe = Jefe::select('id', 'nombre', 'correo', 'password')->from('jefe')->where('correo', '=', $usuario)->where('password', '=', $password)->get();


        if (count($jefe) >= 1) {
            foreach ($jefe as $key) {
                session(['usuario_id' => $key->id]);
                session(['usuario_nombre' => $key->nombre]);
                return view('template');
            }
        } else {

          return back()->with('danger','Datos incorrectos');  
        }
    }

    public function cerrarSesion(Request $request){
    
        $request->session()->forget(['usuario_id', 'usuario_nombre']);
        return redirect('/');
    }
}
