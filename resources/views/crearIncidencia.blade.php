@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Registrar Justificante</title>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-10">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-0">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-2 p-md-5">
                <div class="text-center mb-3 pb-2 mt-3">
                    <h4 style="color: #495057 ;">Registrar incidencia/justificante</h4>
                </div>
                <form class="mb-0" action="{{ route('guardarIncidencia') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                            <label class="form-label" for="fecha_inicio">Fecha de inicio</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control input-custom" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                            <label class="form-label" for="fecha_final">Fecha de finalizacion</label>
                            <input type="date" id="fecha_final" name="fecha_final" class="form-control input-custom" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                            <label class="form-label" for="horario">Horario</label>
                            <select type="text" id="horario" name="horario" class="form-control input-custom">
                                <option value="">Seleccione una opcion</option>
                                <option value="matutino">matutino</option>
                                <option value="vespertino">vespertino</option>
                            </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                            <label class="form-label" for="num_memorandum">Numero de memorandum</label>
                            <input type="number" id="num_memorandum" name="num_memorandum" class="form-control input-custom" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                        <input type="hidden" id="empleado_id" name="empleado_id" value="{{ $empleadoId }}" class="form-control input-custom" />
                        </div>
                    </div>
                    </div>
                    <div class="row mb-4">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="catalogo_de_incidencias_id">Descrición de la incidencia</label>
                        <select class="form-control" id="catalogo_de_incidencias_id" name="catalogo_de_incidencias_id" rows="4">
                            <option value="">Seleccione una opcion</option>
                            @foreach($incidencias as $incidencia)
                                <option value="{{ $incidencia->id }}">{{ $incidencia->resultante }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="float-end ">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-rounded"
                        style="background-color: #0062CC ;">Guardar</button>
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