@extends('template')

@section('content')
<div class="container">
    <form method="post">
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Nombre completo</label>
            <div class="col-8">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre completo">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Telefono</label>
            <div class="col-8">
                <input type="tel" class="form-control" name="telefono" id="telefono" placeholder="Ingrese telefono">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Salario</label>
            <div class="col-8">
                <input type="number" class="form-control" name="salario" id="salario" min="0" placeholder="Ingrese salario">
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Departamento</label>
            <select class="form-select form-select-lg" name="departamento" id="">
                <option value="">Jakarta</option>
            </select>
        </div>
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" class="btn btn-primary">Guardar datos</button>
            </div>
        </div>
    </form>
</div>
@endsection