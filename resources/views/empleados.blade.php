<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>
</head>
<body>
    @extends('navbar')
    @section('content')
        <h1>Empleados</h1>
        <table>
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
    @endsection
</body>
</html>