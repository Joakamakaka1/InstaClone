@extends('partials.layout')

@section('content')
    <div class="bg-gray-100 min-h-screen py-10 px-4 lg:px-20">

        <!-- Título de la página -->
        <h2 class="text-4xl font-bold text-center text-gray-900 mb-10">Nuevo Post</h2>

        <!-- Crear un nuevo Post -->
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg mb-12">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="title" class="text-sm font-semibold text-gray-800">Título</label>
                        <input type="text" id="title" name="title" class="w-full p-3 border border-gray-300 rounded-md bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="publish_date" class="text-sm font-semibold text-gray-800">Fecha de Publicación</label>
                        <input type="date" id="publish_date" name="publish_date" class="w-full p-3 border border-gray-300 rounded-md bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="description" class="text-sm font-semibold text-gray-800">Descripción</label>
                        <textarea id="description" name="description" class="w-full p-3 border border-gray-300 rounded-md bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">
                        Publicar Post
                    </button>
                </div>
            </form>
        </div>

        <!-- Mostrar los posts -->
        <div class="max-w-2xl mx-auto">
            @foreach($posts as $post)
                <div class="bg-white shadow-lg rounded-lg mb-10 overflow-hidden">
                    <!-- Cabecera del Post -->
                    <div class="flex items-center p-4 border-b border-gray-200">
                        <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($post->user->email))) }}?s=40" alt="User Avatar" class="w-10 h-10 rounded-full">
                        <div class="ml-4">
                            <span class="font-semibold text-gray-900">{{ $post->user->name }}</span>
                            <span class="text-sm text-gray-500 block">{{ \Carbon\Carbon::parse($post->publish_date)->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Imagen o contenido del Post -->
                    <div class="relative">
                        <img src="https://via.placeholder.com/700x400" alt="Post Image" class="w-full h-72 object-cover">
                    </div>

                    <!-- Botones de interacción -->
                    <div class="p-4 flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                @csrf
                                @if(in_array(Auth::id(), json_decode($post->liked_users ?? '[]')))
                                    <button type="submit" class="text-red-500 hover:text-red-700 cursor-not-allowed">
                                        <i class="fas fa-heart"></i> Me gusta
                                    </button>
                                @else
                                    <button type="submit" class="text-gray-600 hover:text-red-500">
                                        <i class="fas fa-heart"></i> Me gusta
                                    </button>
                                @endif
                            </form>
                        </div>
                        <span class="text-sm text-gray-500">{{ $post->n_likes }} me gusta</span>
                    </div>

                    <!-- Descripción del Post -->
                    <div class="p-4">
                        <p class="text-gray-900 font-semibold">{{ $post->title }}</p>
                        <p class="text-gray-600 mt-2">{{ $post->description }}</p>
                    </div>

                    <!-- Mostrar Comentarios -->
                    <div class="p-4 border-t border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Comentarios:</h3>
                        @foreach($post->comments as $comment)
                            <div class="mt-2">
                                <div class="flex items-center">
                                    <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($comment->user->email))) }}?s=40" alt="User Avatar" class="w-8 h-8 rounded-full">
                                    <div class="ml-4">
                                        <p class="text-gray-900 font-semibold">{{ $comment->user->name }}</p>
                                        <p class="text-gray-600">{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Añadir un nuevo comentario -->
                    <div class="p-4 border-t border-gray-200">
                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                            @csrf
                            <textarea name="comment" class="w-full p-3 border border-gray-300 rounded-md bg-gray-50" placeholder="Escribe tu comentario..." required></textarea>
                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg mt-2">Comentar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
