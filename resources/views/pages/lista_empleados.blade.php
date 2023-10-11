@extends('template')

@section('content')
<div>
    <!-- el section('content') representa el yield de la 
        vista template -->
    <h1 class="text-center text-success">Gestion de Empleados</h1>

    <a href="{{ url('/formulario') }}" class="btn btn-primary mb-2"><i class='bx bxs-user-plus'></i></a>

    <table class="table">
        <thead>
            <th>Empleado</th>
            <th>Telefono</th>
            <th>Salario</th>
            <th>Departamento</th>
            <th colspan="2">Acciones</th>
        </thead>
        <tbody>
            @foreach ($empleado as $item)
            <tr>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->telefono }}</td>
                <td>${{ $item->salario }}</td>
                <td>{{ $item->id_departamento }}</td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"><i class="bx bxs-edit"></i></button>
                </td>
                <td>
                    <button type="submit" class="btn btn-danger">
                        <form id="formDesactivar" action="{{ route('desactivar.empleado', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')

                        </form> <i class="bx bxs-trash">
                        </i>
                    </button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Empleado</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('actualizar.empleado', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <label for="">Nombre Completo</label>
                                <input type="text" class="form-control" name="nombre" value="{{ $item->nombre }}">

                                <label for="">Telefono</label>
                                <input type="text" class="form-control" name="celular" value="{{ $item->telefono }}">

                                <label for="">Salario</label>
                                <input type="text" class="form-control" name="salario" value="{{$item->salario }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts');
<script>
    $('#formDesactivar').on('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    })
</script>
@endsection