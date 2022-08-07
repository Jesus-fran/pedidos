@extends('index')

@section('contenido')
    <div class="row">
       
        <div class="row gy-2">
            <div class="col-12 text-center">
                <h6>Datos del usuario</h6>
            </div>
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Nombre: </strong> {{$nombre}}</p>
                        <p><strong>Correo electrónico: </strong> {{ $email }}</p>
                        <p><strong>Teléfono </strong> {{ $tel }} </p>
                    </div>
                </div>
    
            </div>
        </div>
        
        <div class="row gy-3">
            <div class="col-md-6 col-sm-12 text-center">
                <h6>Datos de envío del pedido</h6>
            </div>
            <div class="col-md-6 text-center d-none d-sm-block d-md-block">
                <h6>Costo de envío hasta el lugar de destino</h6>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 offset-md-1 gy-3">
            <div class="card">
                <div class="card-body">
                    <div class="col">
                        @if ($status == 'OK')
                            @if ($encontrado == 'OK')
                                <p><strong>Lugar de procedencia: </strong> Universidad Tecnologica de la Selva</p>
                                <p><strong>Lugar de destino: </strong> {{ $destino_dir }}</p>
                                <p><strong>Distancia entre ambos lugares: </strong> {{ $distancia }} </p>
                                <p><strong>Tiempo aproximado en llegar en auto: </strong> {{ $duracion }}</p>
                            @else
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col text-center"><i class="bi bi-emoji-frown"></i>
                                        <h6>Lo sentimos, no se encontró la hubicación seleccionada, <br> verifica y vuelve a
                                            intentarlo</h6>
                                    </div>
                                </div>
                                <br>
                                <br>
                            @endif
                        @else
                            <br>
                            <br>
                            <div class="row">
                                <div class="col text-center"><i class="bi bi-emoji-frown"></i>
                                    <h6>Hubo un error al realizar la solicitud, <br> vuelve a intentarlo</h6>
                                </div>
                            </div>
                            <br>
                            <br>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-center d-sm-block d-md-none gy-3">
            <h6>Costo de envío hasta el lugar de destino</h6>
        </div>
        <div class="col-sm-12 col-md-5 offset-md-1 gy-3">
            <div class="card">
                <div class="card-body">
                    <div class="col text-center">
                        @if ($distancia_value / 1000 <= 100)
                            <p><strong>Precio: </strong> $100.00 MX</p>
                        @elseif ($distancia_value / 1000 <= 200)
                            <p><strong>Precio: </strong> $130.00 MX</p>
                        @elseif ($distancia_value / 1000 <= 400)
                            <p><strong>Precio: </strong> $170.00 MX</p>
                        @elseif ($distancia_value / 1000 <= 700)
                            <p><strong>Precio: </strong> $210.00 MX</p>
                        @elseif ($distancia_value / 1000 <= 1000)
                            <p><strong>Precio: </strong> $250.00 MX</p>
                        @elseif ($distancia_value / 1000 > 1000)
                            <p><strong>Precio: </strong> $350.00 MX</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col text-center">Mapa del lugar de procedencia y el destino del pedido</div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>

        </div>
    </div>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1013AP-y0F2d8zZtwDRbsFVVr7aMbblU&callback=initMap"></script>

    <script>
        var map;
         function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
               center: { lat: 40.349650, lng: -3.695202 },
               zoom: 13
            });
            const longitud = {!! json_encode($long_dest) !!};
            const latitud = {!! json_encode($lat_dest) !!};
            console.log(longitud);
            console.log(latitud);
            //Begin Routing
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);
            const request = {
               origin: new google.maps.LatLng(16.895863879627875, -92.06730387778236),
               destination: new google.maps.LatLng(latitud, longitud),
               travelMode: 'WALKING'
            };
            directionsService.route(request, response => {
               directionsRenderer.setDirections(response);
            });
         }
    </script>

@endsection
