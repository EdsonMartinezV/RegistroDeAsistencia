@include('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Empleado</title>
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-10">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-0">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-2 p-md-5">
                <div class="text-center mb-3 pb-2 mt-3">
                    <h4 style="color: #495057 ;">Registrar nuevo Empleado</h4>
                </div>
                <form class="mb-0" action="{{ route('guardarEmpleado') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                        <label class="form-label" for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control input-custom" />
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                        <label class="form-label" for="tipo_trabajador">Tipo de trabajador</label>
                        <select type="text" id="tipo_trabajador" name="tipo_trabajador" class="form-control input-custom">
                            <option value="">Seleccione una opción</option>
                            <option value="medico">medico</option>
                            <option value="administrativo">administrativo</option>
                        </select>
                        </div>
                    </div>
                    </div>
                    <div class="row mb-4">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="rfc">RFC</label>
                        <input type="text" id="rfc" name="rfc" class="form-control input-custom" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="curp">CURP</label>
                        <input type="text" id="curp" name="curp" class="form-control input-custom" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="catalogo_de_clues_id">CLUES</label>
                        <select type="text" id="catalogo_de_clues_id" name="catalogo_de_clues_id" class="form-control input-custom">
                            <option value="">Seleccione una opción</option>
                            @foreach($clues as $clue)
                                <option value="{{ $clue->id }}">{{ $clue->nombre_entidad }}</option>
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