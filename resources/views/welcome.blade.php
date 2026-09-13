<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Forum Facul') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-indigo-100 via-purple-100 to-pink-100 font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center py-12">

        <div class="relative w-full max-w-md space-y-8 px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-2xl p-8 sm:p-10 max-w-md w-full">
                <h2 class="text-center text-2xl font-bold text-gray-900 mb-4">Bem-vindo de volta</h2>
                <p class="text-center text-gray-600 mb-8">Entre na sua conta para continuar</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Mensagens de erro -->
                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600 text-center">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- E-mail -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Senha -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 text-center">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Lembrar-me e Esqueci a Senha -->
                    <div>
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                class="h-4 w-4 border-gray-300 rounded focus:ring-indigo-500 cursor-pointer">
                            <label for="remember_me" class="ml-2 text-sm text-gray-900 cursor-pointer">
                                Lembrar de mim
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="mt-2 text-right">
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                    Esqueceu a senha?
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Botão Submit -->
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>