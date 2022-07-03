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
    
    <title>Justificante</title>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-10">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-0">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-2 p-md-5">
                <div class="text-center mb-3 pb-2 mt-3">
                    <h4 style="color: #495057 ;">Formulario de justificante</h4>
                </div>
                <form class="mb-0">
        
                    <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                        <label class="form-label" for="form9Example1">Tipo</label>
                        <input type="text" id="form9Example1" class="form-control input-custom" />
                        </div>
                    </div>
                    </div>
 
                    <div class="row mb-4">
                        <div class="col">
                            <h5>Fecha Inicio</h5>
                           <div class='input-group date' id='datetimepicker1'>
                              <input type='text' class="form-control" name="inicio"/>
                              <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                           </div>
                        </div>
                        <div class="col">
                            <h5>Fecha Termino</h5>
                           <div class='input-group date' id='datetimepicker2'>
                              <input type='text' class="form-control" name="inicio"/>
                              <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                           </div>
                        </div>
                        <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker();
                            $('#datetimepicker2').datetimepicker();
                        });
                        
                     </script>
                    </div>

                    <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                        <label class="form-label" for="form9Example3">Horario</label>
                        <input type="text" id="form9Example3" class="form-control input-custom" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        <label class="form-label" for="form9Example4">ID de empleado</label>
                        <input type="text" id="form9Example4" class="form-control input-custom" />
                        </div>
                    </div>
                    </div>
                    
                    <div class="float-end ">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-rounded"
                        style="background-color: #0062CC ;">Enviar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
</body>
</html>