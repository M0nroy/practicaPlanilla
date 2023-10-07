<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class empleadosController extends Controller
{
    //metodo para retornartodos los empleados activos
    public function index(){

       $empleados = Empleados::select('*')->where('id_estado','=',1)->get();

       return view('pages.lista_empleados',array("empleados"=>$empleados));
        
    }
}
