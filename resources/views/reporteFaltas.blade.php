@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    
    <title>Reporte de faltas</title>
</head>
<body>
    @csrf
    <main style="margin-top: 58px">
        <form action="{{ route('obtenerFaltas', $empleadoId) }}" method="GET">
        
        <h1>Reporte de faltas</h1>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-4 col-lg-9 col-xl-12">
                    <div class="row">
                        <div class='col-sm-6'>
                            <div class="form-group">
                                <h6>Fecha Inicio</h6>
                               <div class='input-group date' id='datetimepicker1'>
                                  <input type='text' class="form-control" name="inicio"/>
                                  <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                               </div>
                            </div>
                         </div>
                         <div class='col-sm-6'>
                            <div class="form-group">
                                <h6>Fecha Termino</h6>
                               <div class='input-group date' id='datetimepicker2'>
                                  <input type='text' class="form-control" name="termino"/>
                                  <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                               </div>
                            </div>
                         </div>
        
                         </div>
                         <script type="text/javascript">
                            $(function () {
                                $('#datetimepicker1').datetimepicker();
                                $('#datetimepicker2').datetimepicker();
                            });
        
                         </script>
                         <div class='col-sm-6'>
                            <div class="form-group">
                                <input class="btn btn-primary btn-lg" type="submit" value="Obtener" />
                            </div>
                    </div>
                </form>
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-warning">
                                <td>Día</td>
                                <td>Fecha</td>
                                <td>Hora Entrada</td>
                                <td>Hora Salida</td>
                                <td>Justificado</td>
                              </tr>
                        </thead>
                        <tbody>
                            <tr>
                            @if (!empty($faltas))
                                @foreach ($faltas as $falta)
                                    <tr>
                                        <td>{{ $falta['dia'] }}</td>
                                        <td>{{ $falta['fecha'] }}</td>
                                        <td>{{ $falta['hora_entrada'] }}</td>
                                        <td>{{ $falta['hora_salida'] }}</td>
                                    </tr>
                               @endforeach
                            @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>