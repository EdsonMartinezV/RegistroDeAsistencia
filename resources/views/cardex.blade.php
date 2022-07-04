@extends('navbar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/contenido.css')}}" rel="stylesheet">
    <title>Cardex</title>
</head>
<body>
    <h1>Cardex</h1>
    <main style="margin-top: 58px; margin-left: 150px">
        <div class="row justify-content-center align-items-center h-100 vh-100 gradient-custom">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Año</th>
                        <th scope="col">Mes</th>
                        <th scope="col">1</th>
                        <th scope="col">2</th>
                        <th scope="col">3</th>
                        <th scope="col">4</th>
                        <th scope="col">5</th>
                        <th scope="col">6</th>
                        <th scope="col">7</th>
                        <th scope="col">8</th>
                        <th scope="col">9</th>
                        <th scope="col">10</th>
                        <th scope="col">11</th>
                        <th scope="col">12</th>
                        <th scope="col">13</th>
                        <th scope="col">14</th>
                        <th scope="col">15</th>
                        <th scope="col">16</th>
                        <th scope="col">17</th>
                        <th scope="col">18</th>
                        <th scope="col">19</th>
                        <th scope="col">20</th>
                        <th scope="col">21</th>
                        <th scope="col">22</th>
                        <th scope="col">23</th>
                        <th scope="col">24</th>
                        <th scope="col">25</th>
                        <th scope="col">26</th>
                        <th scope="col">27</th>
                        <th scope="col">28</th>
                        <th scope="col">29</th>
                        <th scope="col">30</th>
                        <th scope="col">31</th>
                    </tr>
                </thead>
                <tbody class="table table-striped">
                    @foreach ($cardex as $anio)
                        <tr>
                            @foreach ($anio as $mes)
                                <th>{{ $mes['anio'] }}</th>
                                <th>{{ $mes['mes'] }}</th>
                                @for ($i = 1; $i <= 31; $i++)
                                    @if (array_key_exists($i, $mes['dias']))
                                        <th>{{ $mes['dias'][$i] }}</th>
                                    @else
                                        <th></th>
                                    @endif
                                @endfor
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @dump($cardex)
        </div>
    </main>
    @endsection
</body>
</html>