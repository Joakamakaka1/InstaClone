@extends('partials.layout')

@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-12">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 max-w-sm">
            <h2 class="text-3xl font-semibold text-center mb-6 text-gray-800">Registrarse</h2>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-600 mb-2">Nombre</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" 
                        class="w-full text-black p-4 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Tu Nombre">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-600 mb-2">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                        class="w-full text-black p-4 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="tucorreo@gmail.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Contraseña</label>
                    <input type="password" id="password" name="password" 
                        class="w-full text-black p-4 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="********">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600 mb-2">Confirmar Contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                        class="w-full text-black p-4 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="********">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300">
                    Registrarse
                </button>
            </form>

            <p class="text-center text-gray-600 mt-6">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Inicia sesión</a>
            </p>
        </div>
    </div>
@endsection
