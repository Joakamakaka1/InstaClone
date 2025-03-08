@extends('partials.layout')

@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto p-6 rounded-lg shadow-lg w-full md:w-1/2 lg:w-1/3 bg-white">
            <!-- Título -->
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Perfil de Usuario</h2>

            <!-- Información del perfil -->
            <div class="mb-6">
                <p class="text-gray-700 text-lg"><strong class="font-semibold text-gray-800">Nombre:</strong> {{ Auth::user()->name }}</p>
                <p class="text-gray-700 text-lg"><strong class="font-semibold text-gray-800">Correo Electrónico:</strong> {{ Auth::user()->email }}</p>
            </div>

            <!-- Botón para eliminar cuenta -->
            <form action="{{ route('profile.delete', Auth::user()->id) }}" method="POST">
                @csrf
                @method('DELETE') <!-- Usamos el método DELETE para eliminar el recurso -->

                <!-- Botón de eliminación de cuenta -->
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg transition duration-300">
                    Eliminar Cuenta
                </button>
            </form>
        </div>
    </div>
@endsection
