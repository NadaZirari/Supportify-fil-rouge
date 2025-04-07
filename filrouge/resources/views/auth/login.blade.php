<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Styles -->
    <!-- @vite('resources/css/app.css') -->
    
    <style>
        .auth-bg {
            background-image: url('/images/background.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#0f1729]">
    <div class="w-full max-w-md p-8 rounded-lg shadow-lg relative overflow-hidden auth-bg">
        <!-- Overlay pour assombrir l'image de fond -->
        <div class="absolute inset-0 bg-[#1a2542]/80 backdrop-blur-sm"></div>
        
        <div class="relative z-10">
            <!-- Onglets -->
            <div class="flex mb-6 border-b border-gray-700">
                <a href="{{ route('register') }}" class="pb-2 px-4 font-medium text-sm text-gray-400">
                    REGISTER
                </a>
                <a href="{{ route('login') }}" class="pb-2 px-4 font-medium text-sm text-blue-400 border-b-2 border-blue-400">
                    LOGIN
                </a>
            </div>

            <!-- Formulaire de connexion -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                
                <div>
                    <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 rounded-md bg-gray-700/50 border border-gray-600 text-white placeholder:text-gray-400 @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 rounded-md bg-gray-700/50 border border-gray-600 text-white placeholder:text-gray-400 @error('password') border-red-500 @enderror" required autocomplete="current-password">
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-blue-500" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="ml-2 text-sm text-gray-400">
                        Remember Me
                    </label>
                </div>
                
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md transition-colors">
                    LOGIN
                </button>
                
                <div class="text-center mt-4">
                    <a href="{{ route('password.request') }}" class="text-sm text-gray-400 hover:text-gray-300">
                        Forgot Password?
                    </a>
                    
                    <div class="mt-4 text-sm text-gray-400">
                        Don't have an account?
                    </div>
                    
                    <a href="{{ route('register') }}" class="mt-2 block w-full bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-4 rounded-md transition-colors text-center">
                        REGISTER
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <!-- @vite('resources/js/app.js') -->
</body>
</html>