<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a InstaClone</title>
    @vite(['resources/css/app.css'])
</head>

<body">
    @include('partials.header')

    <main class="min-h-screen bg-gray-100 flex flex-col items-center justify-center px-4 py-8">
        <div class="text-center mb-12">
            <div class="flex justify-center space-x-6">
                <div>
                    <h1 class="text-5xl font-bold text-gray-900">¡Bienvenido a InstaClone!</h1>
                    <p class="text-xl text-gray-500 mt-4">Comparte tus momentos con el mundo.</p>
                    <p class="text-md text-gray-500 mt-2">Inicia sesión o regístrate para empezar a explorar.</p>
                </div>
            </div>
            @auth
                <a href="{{ route('posts.index') }}">
                    <button class="mt-6 px-8 py-4 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition duration-300">
                        Ver publicaciones
                    </button>
                </a>
            @else
                <a href="{{ route('login') }}">
                    <button class="mt-6 px-8 py-4 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition duration-300">
                        Empezar ahora
                    </button>
                </a>
            @endauth
        </div>

        <section class="container mx-auto py-12 px-6">
            <h3 class="text-3xl font-semibold text-center mb-6 text-gray-900">
                ¿Qué puedes hacer en InstaClone?
            </h3>
            <hr class="border-t border-gray-300 mb-8" />
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-blue-600 text-5xl mb-4">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <p class="text-gray-600 text-lg">
                        Regístrate para crear tu perfil y empezar a compartir tus fotos y videos con la comunidad.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-blue-600 text-5xl mb-4">
                        <i class="fas fa-images"></i>
                    </div>
                    <p class="text-gray-600 text-lg">
                        Explora las publicaciones de otros usuarios, descubre contenido interesante y encuentra inspiración.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-blue-600 text-5xl mb-4">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                    <p class="text-gray-600 text-lg">
                        Deja tus comentarios y reacciones en las publicaciones de otros. Conéctate y comparte tu opinión.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-blue-600 text-5xl mb-4">
                        <i class="fas fa-upload"></i>
                    </div>
                    <p class="text-gray-600 text-lg">
                        Comparte tus momentos subiendo fotos o videos que tus seguidores puedan ver y disfrutar.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-blue-600 text-5xl mb-4">
                        <i class="fas fa-list-ul"></i>
                    </div>
                    <p class="text-gray-600 text-lg">
                        Organiza y comparte tus publicaciones favoritas creando listas temáticas para tus seguidores.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-blue-600 text-5xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <p class="text-gray-600 text-lg">
                        Conoce a nuevos usuarios, sigue sus perfiles y mantente actualizado con sus últimas publicaciones.
                    </p>
                </div>
            </div>
        </section>
    </main>


    @include('partials.footer')
    </body>

</html>