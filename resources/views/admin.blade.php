<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/admin.css'])
</head>
    <body class="antialiased">
        <div>
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profile</a>
                        <span class="mx-2"> <!-- Añade espacio horizontal entre enlaces -->
                            <a href="{{ url('/reservas') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Reservas</a>
                        </span>
                        <a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="cajalogo">
                <img class="logo" src="/img/logo.png" alt="">
            </div>
            <form action="{{ route('admin.crearServicio') }}" method="post" class="formulario">
                @csrf
                <div class="title">
                    <h1>Crear un servicio</h1>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre del servicio:</label><input type="text" name="nombre">
                </div>
                <div class="form-group">
                    <label for="precio">Precio del servicio:</label><input type="number"  name="precio">
                </div>
                <div class="form-group">
                    <label for="duracion">Duracion del servicio (en minutos):</label><input type="number" name="duracion">
                </div>
                <div class="cont-crear">
                    <button type="submit" class="btn-crear">Crear</button>
                </div>
            </form >
            <div class="title">
                <h1>Eliminar servicio</h1>
            </div>
            @php
                $servicios = App\Models\Servicio::all();
            @endphp
            @foreach($servicios as $servicio)
                <div class="servicios">
                    <p>{{ $servicio->nombre }} - {{ $servicio->precio }}€</p>
                    <form action="{{ route('admin.eliminar', ['id' => $servicio->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="eliminar-reserva-btn">Eliminar</button>
                    </form>
                </div>
             @endforeach
            <div class="title">
                <h1>Gestión de Reservas</h1>
            </div>
            @php
                $reservas = App\Models\Reserva::all();
            @endphp
            @forelse ($reservas as $reserva)
            @php
                $fechaHoraReserva = $reserva->fecha . ' ' . $reserva->hora;
                $fechaHoraActual = now()->format('Y-m-d H:i:s');
                $pasado = $fechaHoraReserva < $fechaHoraActual;
                $user = App\Models\User::find($reserva->user_id);
            @endphp

            @if (!$pasado)
                <div class="cont-reserva">
                    <p>Dia:{{$reserva->fecha}} - Hora:{{$reserva->hora}} Nombre: {{$user->name}}</p>
                    <form action="{{ route('reserva.eliminar', ['id' => $reserva->id, 'fecha' => $reserva->fecha, 'hora' => $reserva->hora]) }}" method="post" class="eliminar-reserva-form">
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </div>
            @endif
            @empty
                <p>No hay ningun reserva hecha </p>
            @endforelse
        </div>
</body>
</html>
