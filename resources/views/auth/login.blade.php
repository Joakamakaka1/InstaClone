@extends('partials.layout')

@section('content')
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4 py-12">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 max-w-sm">
            <h2 class="text-3xl font-semibold text-center mb-6 text-gray-800">Iniciar sesión</h2>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email Input -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-600 mb-2">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                        class="w-full text-black p-4 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="tucorreo@email.com">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Contraseña</label>
                    <input type="password" id="password" name="password" 
                        class="w-full text-black p-4 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="********">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex justify-between items-center mb-6">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" class="mr-2">
                        Recuérdame
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300">
                    Iniciar sesión
                </button>
            </form>

            <p class="text-center text-gray-600 mt-6">
                ¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Regístrate aquí</a>
            </p>
        </div>
    </div>
@endsection
