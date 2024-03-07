<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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



        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/home.css'])


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
            <div class="cajalogo">
                <img class="logo" src="/img/logo.png" alt="">
            </div>
            <div class="text-with-image">
                <div class="text">
                    <p>En nuestro centro de estética, nos enorgullece contar con más de 20 años de experiencia en el sector. Ubicados en el centro de Castelldefels, hemos sido parte de esta hermosa comunidad desde el principio. Nuestro compromiso siempre ha sido ofrecer servicios de alta calidad, combinados con una atención cálida y amable.</p>
                    <p>En nuestro centro, nos esforzamos por crear un ambiente acogedor y relajante para nuestros clientes. Creemos que una experiencia de estética debe ser placentera y rejuvenecedora. Nuestra reputación por ser simpáticos y amigables es algo que valoramos enormemente y nos esforzamos por mantener en cada interacción con nuestros clientes.</p>
                    <p>Si estás buscando un lugar donde recibir tratamientos de belleza y bienestar con la garantía de un servicio excepcional, no dudes en visitarnos. Estamos aquí para ayudarte a lucir y sentirte lo mejor posible.</p>
                </div>
                <div class="cajaimg">
                    <img class="foto" src="/img/local.jpg" alt="">
                </div>
            </div>

            <div class="titulo"><h2 class="servicio">Servicios</h2></div>

            <div class="contServicios">

                <div>
                    <ul>
                        <li>Manicura: 15€</li>
                        <li>Manicura Shellac: 30€</li>
                        <li>Relleno nuevo : 37 €</li>
                        <li>Pedicura: 32€</li>
                        <li>Relleno semipermanente : 32€</li>
                        <li>Nail art cortas: 4€</li>
                        <li>A nail art largas: 7€</li>
                        <li>Cejas: 5€ </li>
                    </ul>
                </div>
                <div class="servicioder">
                    <ul>
                        <li>Acrilico XXL: 40€</li>
                        <li>Pedicura semipermanente: 37€</li>
                        <li>Arreglar uña : 5€</li>
                        <li>Manicura chico: 12€</li>
                        <li>Labios: 4€</li>
                        <li>Retirar acrilico: 15€ </li>
                        <li>Arreglar uña Acrilico : 7€</li>
                    </ul>
                </div>

            </div>
            <div class="donde_encontrarnos">
                <h2>¿DÓNDE NOS ENCONTRAMOS?</h2>
                <p>Nuestro centro de estética, con más de 20 años de experiencia, se encuentra en el corazón de Castelldefels, justo en frente de la e
                    ncantadora plaza de la iglesia. Ubicados en la calle D'Arcadi Balaguer, número 52, hemos sido parte de esta comunidad durante
                    décadas, ofreciendo servicios de belleza y bienestar a nuestros clientes. ¡Te invitamos a visitarnos y descubrir por qué somos el
                    destino preferido para el cuidado personal en nuestra ciudad!</p>
            </div>
            <div id="mi_mapa" class="mi_mapa"></div>


        </div>

        <script>
            let map = L.map('mi_mapa').setView([41.28063,1.97772], 16)

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

            L.marker([41.28063,1.97772]).addTo(map).bindPopup("Tienda IdaNails")
        </script>
    </body>
</html>
