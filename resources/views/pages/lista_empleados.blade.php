@extends('template')

@section('content')
<div>
    <!-- el section('content') representa el yield de la 
        vista template -->
    <h1 class="text-center text-success">Gestion de Empleados</h1>

    <a href="#" class="btn btn-primary mb-2"><i class='bx bxs-user-plus'></i></a>

    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Empleado</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Salario</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($empleados as $empleado)
                <tr class="">
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->telefono}}</td>
                    <td>${{$empleado->salario}}</td>
                    <td>{{$empleado->id_departamento}}</td>
                    <td><button type="button" class="btn btn-warning"><i class="bx bxs-edit"></i></button> <button type="button" class="btn btn-danger"><i class="bx bxs-trash"></i></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection