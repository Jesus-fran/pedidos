<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <title>Pedidos</title>
</head>

<body>

    <nav class="navbar">
        <div class="container">

            <a href="{{ url('/') }}">
                <i class="bi bi-shop"></i>
                <i>Tienda</i>
            </a>
            
            <a href="">Productos</a>
            <form class="d-flex">
                <input class="form-control me-2 buscador" type="search" placeholder="Buscar productos"
                    aria-label="buscar">
            </form>
            <a href="">Ingresar</a>
            <a href="">Crear mi cuenta</a>
        </div>
    </nav>
    <br><br>
    <div class="container-fluid">
        @section('contenido')
            <div class="row">
                <div class="col offset-1">
                    <h6>Pedidos</h6>
                    <p>Realice su pedido ingresando sus datos en el formulario</p>
                    <br>
                </div>
            </div>
            <div class="row">

                <div class="col-10 offset-1">
                    <div class="card">
                        <div class="card-body">

                            <form class="row g-3 needs-validation" action="{{ route('calcular-envio') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Nombre completo</label>
                                    <div class="input-group">

                                        <input type="text" name="name"  value="{{ old('name') }}" class="form-control" id="validationCustomUsername"
                                            aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback d-block">
                                            @error('name')
                                                Porfavor ingrese su nombre completo <br>
                                                {{'('.$message.')'}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustomUsername" class="form-label">Correo electrónico</label>
                                    <div class="input-group">

                                        <input type="email" name="email"  value="{{ old('email') }}" class="form-control"
                                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback d-block">
                                            
                                            @error('email')
                                                Ingrese un correo válido <br>
                                                {{'('.$message.')'}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Telefono</label>
                                    <div class="input-group">

                                        <input type="text" name="tel"  value="{{ old('tel') }}" class="form-control" id="validationCustomUsername"
                                            aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback d-block">
                                            
                                            @error('tel')
                                                Ingrese un número de telefono valido <br>
                                                {{'('.$message.')'}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row gy-4">
                                    <div class="col-12 text-center">
                                        <p>Datos de envío</p>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Estado</label>
                                    <input type="text" name="estado"  value="{{ old('estado') }}" class="form-control" id="validationCustom03"
                                        required>
                                    <div class="invalid-feedback d-block">
                                        
                                        @error('estado')
                                            Porfavor ingrese su estado <br>
                                            {{'('.$message.')'}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Municipio</label>
                                    <input type="text" name="municipio"  value="{{ old('municipio') }}" class="form-control" id="validationCustom03" required>
                                    <div class="invalid-feedback d-block">
                                        
                                        @error('municipio')
                                            Porfavor ingrese su municipio <br>
                                            {{'('.$message.')'}}
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Código postal</label>
                                    <input type="number" name="cp"  value="{{ old('cp') }}" class="form-control" id="validationCustom03" required>
                                    <div class="invalid-feedback d-block">
                                       
                                        @error('cp')
                                        Porfavor ingrese su código postal <br>
                                        {{'('.$message.')'}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Colonia</label>
                                    <input type="text" name="colonia"  value="{{ old('colonia') }}" class="form-control" id="validationCustom03"
                                        required>
                                    <div class="invalid-feedback d-block">
                                        
                                        @error('colonia')
                                            Porfavor ingrese su colonia <br>
                                            {{'('.$message.')'}}
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Calle</label>
                                    <input type="text" name="calle"  value="{{ old('calle') }}" class="form-control" id="validationCustom03" required>
                                    <div class="invalid-feedback d-block">
                                        
                                        @error('calle')
                                            Porfavor ingrese una calle <br>
                                            {{'('.$message.')'}}
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 offset-md-5 col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terminos" type="checkbox" value="1" id="invalidCheck" required>
                                            <label class="form-check-label" for="invalidCheck">
                                                Aceptar los terminos y condiciones
                                            </label>
                                            <div class="invalid-feedback d-block">
                                               
                                                @error('terminos')
                                                {{'('.$message.')'}}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-success" type="submit">Calcular envío</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        @show
    </div>
    <br><br>
    <div class="footer">
        <nav class="navbar">
            <div class="container">
                <ul>
                    <li class="fw-bold">Redes sociales</li>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">WhatsApp</a></li>
                    <li><a href="">Instagram</a></li>
                </ul>
                <ul>
                    <li class="fw-bold">Politicas</li>
                    <li><a href="">Politicas de privacidad</a></li>
                    <li><a href="">Terminos y condiciones</a></li>
                </ul>
                <ul>
                    <li class="fw-bold">Ayuda</li>
                    <li><a href="">Solución de problemas</a></li>
                    <li><a href="">Contacto de soporte</a></li>
                    <li><a href="">Dudas y sugerencias</a></li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>
