<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Departamentos;


class PDFController extends Controller
{
    public function obtenerEmpleadosByJefe(){

        $empleado = Empleados::join('departamento','empleados.id_departamento','=','departamento.id')->join('estado','empleados.id_estado','=','estado.id')->select('empleados.*','departamento.nombre as departamento','estado.estado')->where('empleados.id_jefe','=',session('jefe_id'))->get();
        
        $pdf = PDF::loadView('PDF.reporte_empleado', compact('empleado'));

        return $pdf->stream('Lista_empleados.pdf');
    }

    public function getDepartamentoRepo(){
    
        $departamentos = Departamentos::all();
        return view('pages.filtrado_departamentos', array("departamentos" => $departamentos));
    }

    public function reporteEmpleadosByDepartamento(Request $request){
        $departamento = $request->post('departamento');
        //select * from empleados where id_departamento = $departamento AND id_jefe = session('jefe_id')

        $empleado = Empleados::join('departamento','empleados.id_departamento','=','departamento.id')->join('estado','empleados.id_estado','=','estado.id')->select('empleados.*','departamento.nombre as departamento','estado.estado')->where('empleados.id_jefe','=',session('jefe_id'))->where('empleados.id_departamento','=', $departamento)->get();

        //return response()->json($empleado);
        $pdf = PDF::loadView('PDF.reporte_empleado_departamento', compact('empleados'));
        /**
         * stream() => visualiza el pdf y tiene la opcion de descargar
         * download() => descargar el pdf de inmediato
         */
        return $pdf->stream('empleados_departamento.pdf'); //

    }
}
