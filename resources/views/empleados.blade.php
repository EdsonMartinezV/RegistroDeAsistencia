@extends('navbar')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/contenido.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> 
</head>
<body>
    <main style="margin-top: 58px">
        <div class="vh-100 gradient-custom">
            <h1>Empleados</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->nombre }}</td>
                            <td><a href="{{ route('cardex', $empleado->id) }}">Cardex</a></td>
                            <td><a href="{{ route('faltas', $empleado->id) }}">Reporte de Faltas</a></td>
                        </tr>
                        <br>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('crearEmpleado') }}">Registrar nuevo empleado</a>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
@endsection