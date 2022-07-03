@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Incidencias</title>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-10">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-0">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-2 p-md-5">
                <div class="text-center mb-3 pb-2 mt-3">
                    <h4 style="color: #495057 ;">Formulario de incidencias</h4>
                </div>
                <form class="mb-0">
        
                    <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                        <input type="text" id="form9Example1" class="form-control input-custom" />
                        <label class="form-label" for="form9Example1">Tipo de incidencia</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        <input type="text" id="form9Example2" class="form-control input-custom" />
                        <label class="form-label" for="form9Example2">Resultante</label>
                        </div>
                    </div>
                    </div>
                    <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                        <input type="text" id="form9Example3" class="form-control input-custom" />
                        <label class="form-label" for="form9Example3">Penalización</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        <input type="text" id="form9Example4" class="form-control input-custom" />
                        <label class="form-label" for="form9Example4">Porcentaje de Penalización</label>
                        </div>
                    </div>
                    </div>
                    <div class="row mb-4">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example3">Descrición de la incidencia</label>
                        <textarea class="form-control" id="form4Example3" rows="4"></textarea>
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