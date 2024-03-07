<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    @vite(['resources/css/app.css', 'resources/js/reservas.js', 'resources/css/reservas.css'])
</head>
</head>
<body>
    <div class="title-reservas">
        <h1>Hacer una reserva</h1>
    </div>
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">profile</a>
                        <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                        @if(Auth::user()->hasRole()==1)
                            <a href="{{ url('/admin') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Admin</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
    @endif
    <form class="formulario" action="{{ route('reserva.confirmar') }}" method="post" onsubmit="return validarCheckbox(event)">
        @csrf

        @php
            $servicios = App\Models\Servicio::all();
        @endphp
        <div class="cont-servicios">
            <p class="seleccionar">Selecciona los servicios:</p>
            @foreach($servicios as $servicio)
                <div class="servicios">
                    <p>{{ $servicio->nombre }} - {{ $servicio->precio }}€</p>
                    <input type="checkbox" name="servicios[]" value="{{ $servicio->id }}"> <br>
                </div>
            @endforeach
        </div>
        <div class="select-fecha">
            <p>Selecciona la fecha de la reserva (lunes a viernes):</p>
            <input class="fecha_reserva" type="date" name="fecha_reserva" id="fecha_reserva" required>
        </div>
        <div class="caja-continuar">
            <button type="submit" class="btn-continuar" id="submitBtn">Continuar</button>
        </div>
    </form>
    <div>
        <h2 class="title-reservas">Mis reservas </h2>
    </div>
    @php
        $userId = auth()->id();
        $reservas = App\Models\Reserva::where('user_id', $userId)->get();
    @endphp

    @forelse ($reservas as $reserva)
        @php
            $fechaHoraReserva = $reserva->fecha . ' ' . $reserva->hora;
            $fechaHoraActual = now()->format('Y-m-d H:i:s');
            $pasado = $fechaHoraReserva < $fechaHoraActual;
        @endphp

        @if (!$pasado)
            <div class="cont-reserva">
                <p>Dia:{{$reserva->fecha}} - Hora:{{$reserva->hora}}</p>
                <form action="{{ route('reserva.eliminar', ['id' => $reserva->id, 'fecha' => $reserva->fecha, 'hora' => $reserva->hora]) }}" method="post" class="eliminar-reserva-form">
                    @csrf
                    <button type="submit" class="eliminar-reserva-btn">Eliminar</button>
                </form>
            </div>
        @endif
        @empty
        <p>Todavía no has hecho ninguna reserva</p>
    @endforelse


    <script>
         function validarCheckbox(event) {
            // Obtener todos los checkboxes con el nombre "servicios[]"
            var checkboxes = document.querySelectorAll('input[name="servicios[]"]');
            var checked = false;

            // Verificar si al menos uno está marcado
            for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checked = true;
                break; // Salir del bucle si se encuentra al menos uno marcado
                }
            }

            // Mostrar un mensaje de alerta si ningún checkbox está marcado
            if (!checked) {
             alert('Debes seleccionar al menos un servicio.');
                event.preventDefault(); // Detener el envío del formulario
            }
        }
    </script>
</body>
</html>
