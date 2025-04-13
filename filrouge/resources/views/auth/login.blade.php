<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-tech-pattern {
            background-image: url('a.jpg');
            background-size: cover;
            background-blend-mode: overlay;
        }
        .dropdown-toggle:focus + .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-[#1a2035] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md rounded-lg bg-[#2a3552] bg-opacity-90 p-8 shadow-lg bg-tech-pattern">
        <div class="mb-6 flex items-center justify-center space-x-4">
            <h1 class="text-xl font-bold text-white">LOGIN</h1>
            <a href="{{ route('register') }}" class="text-xl font-bold text-gray-400 hover:text-white">REGISTER</a>
        </div>

        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            
        @csrf
    
    @if(session('success'))
        <div class="bg-green-500/20 p-4 rounded-lg mb-4">
            <p class="text-white text-sm">{{ session('success') }}</p>
        </div>
    @endif
    
    @if($errors->any())
        <div class="bg-red-500/20 p-4 rounded-lg mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li class="text-white text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <div>
                <label for="email" class="mb-1 block text-xs font-medium uppercase text-white">Email</label>
                <input
                    id="email"
                    type="email"
                    class="w-full rounded bg-white/20 p-3 text-white placeholder-gray-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder=""
                >
            </div>

            <div>
                <label for="password" class="mb-1 block text-xs font-medium uppercase text-white">Password</label>
                <input
                    id="password"
                    type="password"
                    class="w-full rounded bg-white/20 p-3 text-white placeholder-gray-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder=""
                >
            </div>

            
               

            <button
                type="submit"
                class="mt-6 w-full rounded-md bg-[#ff6b45] p-3 text-center font-medium text-white hover:bg-[#ff5a30] focus:outline-none focus:ring-2 focus:ring-[#ff6b45] focus:ring-offset-2"
            >
                LOGIN
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="#" class="text-sm text-gray-300 hover:text-white">Forgot Password?</a>

            <div class="mt-6 border-t border-gray-600 pt-6">
                <p class="text-center text-sm text-gray-300">Already Member?</p>
                <a
                    href="#"
                    class="mt-2 block w-full rounded-md bg-[#3b82f6] p-3 text-center font-medium text-white hover:bg-[#2563eb] focus:outline-none focus:ring-2 focus:ring-[#3b82f6] focus:ring-offset-2"
                >
                    LOGIN
                </a>
            </div>
        </div>
    </div>

  
</body>
</html>