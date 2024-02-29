<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    @vite(['resources/css/app.css', 'resources/js/reservas.js', 'resources/css/confirmacion.css'])
</head>
<body>
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">profile</a>
                        <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
    @endif
    <div class="title-confirmacion">
        <h1>Confirmación de Reserva</h1>
    </div>


    <h2 class="seleccionados">Servicios Seleccionados:</h2>
    <ul>
        @php
            $importe = 0; // Inicializando la variable
        @endphp

        @foreach($datosFormulario['servicios'] as $servicioId)
            @php
                $servicio = App\Models\Servicio::find($servicioId);
                $importe+=$servicio->precio;
                $fecha= $datosFormulario['fecha_reserva'];
            @endphp
            <div class="servicios">
                <li>{{ $servicio->nombre }} - {{ $servicio->precio }}€</li>
            </div>
        @endforeach
    </ul>

    <h2 class="sub-title">Importe Total</h2>
        <p class="text">el importe total es {{$importe}}€</p>

    <h2 class="sub-title">Fecha de Reserva</h2>
    <p class="text">{{ $datosFormulario['fecha_reserva'] }}</p>
    @php
        $fecha = $datosFormulario['fecha_reserva'];
@endphp
    <form action="{{ route('reserva.crearReserva') }}" method="POST" class="horas" >
        @csrf
        <h2 class="sub-title">Selecciona la hora de la reserva:</h2>
            <input type="hidden" name="fecha_reserva" value="{{ $fecha }}">
        <div>
            <select name="hora_reserva">
                @for ($hour = 9; $hour <= 19; $hour++)
                     @php
                        $hora = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
                        $fecha= $datosFormulario['fecha_reserva'];
                        $reservaExistente = App\Models\Reserva::where('fecha', $fecha)->where('hora', $hora)->exists();
                    @endphp
                    @if (!$reservaExistente)
                        <option value="{{ $hora }}">{{ $hora }}</option>
                    @endif
                @endfor
            </select>
        </div>
        <div class="caja-confirmar">
            <br><button class="btn-confirmar" type="submit">Confirmar</button>
        </div>
    </form>

</body>
</html>
