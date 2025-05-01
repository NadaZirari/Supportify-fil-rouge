<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html { overflow: hidden; }
        body { height: 100vh; width: 100vw; overflow: scroll; }
        input:not(:placeholder-shown) { border-color: #00384480; }
        input.error { border-color: #ff000050; }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    container: { center: true, padding: '1rem' },
                    colors: {
                        dutchWhite: {
                            100: '#fff3dd', 200: '#fff1d7', 300: '#ffefd1', 400: '#ffedcc',
                            500: '#ffebc6', 600: '#e6d4b2', 700: '#ccbc9e', 800: '#b3a58b', 900: '#998d77'
                        },
                        selectiveYellow: '#ffb100',
                        amaranthanPink: '#f194b4',
                        caribbeanCurrent: '#006C67',
                        midnightGreen: '#1E3A8A'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white min-h-screen flex flex-col">
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Main Content -->
    <section class="w-full h-full bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-2 h-full w-full relative">
            <!-- Login Section -->
            <div class="md:h-full relative group order-2 lg:order-1" id="login">
                <div class="absolute h-full w-full top-0 left-0 z-20 bg-gradient-to-bl from-[#1E3A8A] from-10% to-[#000000] to-90% shadow-[0px_4px_16px_rgba(0,0,0,0.2),_0px_8px_24px_rgba(0,0,0,0.2),_0px_16px_56px_rgba(0,0,0,0.2)] overflow-hidden pointer-events-none group-[.active]:pointer-events-auto transition-opacity duration-1000 ease-in-out opacity-0 group-[.active]:opacity-100">
                    <div class="relative h-full w-full flex flex-col items-center justify-center translate-x-full opacity-0 group-[.active]:translate-x-0 group-[.active]:opacity-100 overflow-hidden transition-all duration-500 ease-in-out">
                        <div class="flex-1 flex flex-col items-center justify-center gap-8 lg:gap-16">
                            <h2 class="text-4xl text-gray-50 text-center font-black font-sans">
                                <span class="lg:text-6xl">Salut !</span>
                            </h2>
                            <p class="text-base px-6 max-w-md text-center text-gray-200 font-light text-sm">
                                Nous sommes heureux de vous aider à créer un compte. Cliquez ci-dessous pour vous connecter.
                            </p>
                            <button class="items-center justify-center w-full px-6 py-2.5 text-center text-gray-50 duration-200 bg-none inline-flex hover:bg-white hover:text-midnightGreen focus:outline-none focus-visible:outline-black text-sm focus-visible:ring-midnightGreen toggle transition-all duration-500 ease-in-out" type="button" onclick="toggleForm()">
                                <span>Se connecter</span>
                                <span class="ml-4">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="mt-auto py-1.5 text-dutchWhite-700">
                            <ul class="flex flex-row items-center justify-center gap-4">
                                <li><a href="#" class="text-xs hover:text-dutchWhite-900 transition-all duration-500 ease-in-out">Conditions</a></li>
                                <li><a href="#" class="text-xs hover:text-dutchWhite-900 transition-all duration-500 ease-in-out">Politiques</a></li>
                                <li><a href="#" class="text-xs hover:text-dutchWhite-900 transition-all duration-500 ease-in-out">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="relative z-10 flex flex-col flex-1 px-4 py-10 bg-white lg:py-24 md:flex-none md:px-28 sm:justify-center md:h-full overflow-hidden">
                    <div class="w-full max-w-md mx-auto md:max-w-sm md:px-0 md:w-96 sm:px-4 group-[.active]:translate-x-full group-[.active]:opacity-0 transition-all duration-500 ease-in-out">
                        <div class="flex flex-col gap-8">
                            <h2 class="text-4xl text-midnightGreen text-center font-black font-sans">Connexion</h2>
                            <div class="flex flex-row gap-8 items-center justify-center wrap">
                                <a href="{{ route('auth.google.redirect') }}" class="inline-flex items-center justify-center w-8 h-8 bg-transparent border border-midnightGreen text-midnightGreen">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                                        <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                                
                            </div>
                            <p class="text-center text-xs text-dutchWhite-700">Ou connectez-vous avec votre compte</p>
                        </div>
                        @if($errors->any())
                            <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                                @if($errors->has('inactive'))
                                    {{ $errors->first('inactive') }}
                                @else
                                    {{ $errors->first() }}
                                @endif
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-4 space-y-6">
                                <div class="relative col-span-full">
                                    <label class="block mb-3 text-sm font-medium text-gray-600 sr-only">Email</label>
                                    <input class="block w-full px-4 py-1.5 text-midnightGreen bg-white border-b border-gray-200 appearance-none placeholder:text-gray-300 focus:border-midnightGreen focus:outline-none focus:ring-midnightGreen text-xs placeholder:font-light" placeholder="email@moi.com" name="email" type="email" required />
                                </div>
                                <div class="col-span-full relative">
                                    <label class="block mb-3 text-sm font-medium text-gray-600 sr-only">Mot de passe</label>
                                    <input class="block w-full px-4 py-1.5 text-midnightGreen bg-white border-b border-gray-200 appearance-none placeholder:text-gray-300 focus:border-midnightGreen focus:outline-none focus:ring-midnightGreen text-xs placeholder:font-light" placeholder="Mot de passe" autocomplete="off" name="password" type="password" required />
                                    <button class="group absolute right-0 top-1/2 -translate-y-1/2 togglePasswordVisibility" type="button">
                                        <span class="hidden group-[.active]:block">
                                            <svg class="w-3 h-3 text-midnightGreen/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </span>
                                        <span class="block group-[.active]:hidden">
                                            <svg class="w-3 h-3 text-midnightGreen/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                    <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-span-full text-right">
                                    <a href="#" class="text-xs text-midnightGreen underline text-dutchWhite-700 hover:text-dutchWhite-900 transition-all duration-500 ease-in-out">Mot de passe oublié</a>
                                </div>
                                <div class="col-span-full">
                                    <button class="items-center justify-center w-full px-6 py-2.5 text-center text-white duration-200 bg-midnightGreen border border-midnightGreen inline-flex hover:bg-transparent hover:border-midnightGreen hover:text-midnightGreen focus:outline-none focus-visible:outline-black text-sm focus-visible:ring-midnightGreen transition-all duration-500 ease-in-out" type="submit">Se connecter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Registration Section -->
            <div class="md:h-full relative active group order-1 lg:order-2" id="signup">
                <div class="absolute h-full w-full top-0 left-0 z-20 bg-gradient-to-br from-[#1E3A8A] from-10% to-[#001114] to-90% shadow-[0px_4px_16px_rgba(0,0,0,0.2),_0px_8px_24px_rgba(0,0,0,0.2),_0px_16px_56px_rgba(0,0,0,0.2)] overflow-hidden pointer-events-none group-[.active]:pointer-events-auto transition-opacity duration-1000 ease-in-out opacity-0 group-[.active]:opacity-100">
                    <div class="relative h-full w-full flex flex-col items-center justify-center -translate-x-full opacity-0 group-[.active]:translate-x-0 group-[.active]:opacity-100 overflow-hidden transition-all duration-500 ease-in-out">
                        <div class="flex-1 flex flex-col items-center justify-center gap-8 lg:gap-16">
                            <h2 class="text-4xl text-gray-50 text-center font-black font-sans">
                                <span class="lg:text-6xl">Bon retour !</span>
                            </h2>
                            <p class="text-sm max-w-md text-center text-gray-200 font-light px-6">
                                Nous sommes heureux de vous revoir. Cliquez ci-dessous pour créer un compte.
                            </p>
                            <button class="items-center justify-center w-full px-6 py-2.5 text-center text-gray-50 duration-200 bg-none inline-flex hover:bg-white hover:text-midnightGreen focus:outline-none focus-visible:outline-black text-sm focus-visible:ring-midnightGreen toggle transition-all duration-500 ease-in-out" type="button" onclick="toggleForm()">
                                <span class="mr-4 rotate-180">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </span>
                                <span>Créer un compte</span>
                            </button>
                        </div>
                        <div class="mt-auto py-1.5 text-dutchWhite-700">
                            <ul class="flex flex-row items-center justify-center gap-4">
                                <li><a href="#" class="text-xs hover:text-dutchWhite-900 transition-all duration-500 ease-in-out">Conditions</a></li>
                                <li><a href="#" class="text-xs hover:text-dutchWhite-900 transition-all duration-500 ease-in-out">Politiques</a></li>
                                <li><a href="#" class="text-xs hover:text-dutchWhite-900 transition-all duration-500 ease-in-out">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col flex-1 px-4 py-10 bg-white lg:py-24 md:flex-none md:px-28 sm:justify-center md:h-full overflow-hidden">
                    <div class="w-full max-w-md mx-auto md:max-w-sm md:px-0 md:w-96 sm:px-4 group-[.active]:-translate-x-full group-[.active]:opacity-0 transition-all duration-500 ease-in-out">
                        <div class="flex flex-col gap-8">
                            <h2 class="text-4xl text-midnightGreen text-center font-black font-sans">Créer un compte</h2>
                            <div class="flex flex-row gap-8 items-center justify-center wrap">
                                <a href="{{ route('auth.google.redirect') }}" class="inline-flex items-center justify-center w-8 h-8 bg-transparent border border-midnightGreen text-midnightGreen">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                                        <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                               
                            </div>
                            <p class="text-center text-xs text-dutchWhite-700">Ou créer un compte avec votre email</p>
                        </div>
                        @if($errors->any())
                            <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-4 space-y-6">
                                <div>
                                    <label class="block mb-3 text-sm font-medium text-gray-600 sr-only">Nom d'utilisateur</label>
                                    <input class="block w-full px-4 py-1.5 text-midnightGreen bg-white border-b border-gray-200 appearance-none placeholder:text-gray-300 focus:border-midnightGreen focus:outline-none focus:ring-midnightGreen text-xs placeholder:font-light" placeholder="Nom d'utilisateur" name="name" type="text" required />
                                </div>
                                <div>
                                    <label class="block mb-3 text-sm font-medium text-gray-600 sr-only">Email</label>
                                    <input class="block w-full px-4 py-1.5 text-midnightGreen bg-white border-b border-gray-200 appearance-none placeholder:text-gray-300 focus:border-midnightGreen focus:outline-none focus:ring-midnightGreen text-xs placeholder:font-light" placeholder="email@moi.com" name="email" type="email" required />
                                </div>
                                <div class="col-span-full relative">
                                    <label class="block mb-3 text-sm font-medium text-gray-600 sr-only">Mot de passe</label>
                                    <input class="block w-full px-4 py-1.5 text-midnightGreen bg-white border-b border-gray-200 appearance-none placeholder:text-gray-300 focus:border-midnightGreen focus:outline-none focus:ring-midnightGreen text-xs placeholder:font-light" placeholder="Mot de passe" name="password" autocomplete="off" type="password" required />
                                    <button class="group absolute right-0 top-1/2 -translate-y-1/2 togglePasswordVisibility" type="button">
                                        <span class="hidden group-[.active]:block">
                                            <svg class="w-3 h-3 text-midnightGreen/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </span>
                                        <span class="block group-[.active]:hidden">
                                            <svg class="w-3 h-3 text-midnightGreen/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                    <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-span-full relative">
                                    <label class="block mb-3 text-sm font-medium text-gray-600 sr-only">Confirmer le mot de passe</label>
                                    <input class="block w-full px-4 py-1.5 text-midnightGreen bg-white border-b border-gray-200 appearance-none placeholder:text-gray-300 focus:border-midnightGreen focus:outline-none focus:ring-midnightGreen text-xs placeholder:font-light" placeholder="Confirmer le mot de passe" autocomplete="off" name="password_confirmation" type="password" required />
                                    <button class="group absolute right-0 top-1/2 -translate-y-1/2 togglePasswordVisibility" type="button">
                                        <span class="hidden group-[.active]:block">
                                            <svg class="w-3 h-3 text-midnightGreen/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </span>
                                        <span class="block group-[.active]:hidden">
                                            <svg class="w-3 h-3 text-midnightGreen/50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                    <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-span-full">
                                    <label class="block mb-3 text-sm font-medium text-gray-600 sr-only">Rôle</label>
                                    <select name="role" class="block w-full px-4 py-1.5 text-midnightGreen bg-white border-b border-gray-200 appearance-none focus:border-midnightGreen focus:outline-none focus:ring-midnightGreen text-xs" required>
                                        <option value="User">User</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Agent">Agent</option>
                                    </select>
                                </div>
                                <div class="col-span-full">
                                    <button class="items-center justify-center w-full px-6 py-2.5 text-center text-white duration-200 bg-midnightGreen border border-midnightGreen inline-flex hover:bg-transparent hover:border-midnightGreen hover:text-midnightGreen focus:outline-none focus-visible:outline-black text-sm focus-visible:ring-midnightGreen transition-all duration-500 ease-in-out" type="submit">S'inscrire</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        function toggleForm() {
            document.getElementById('login').classList.toggle('active');
            document.getElementById('signup').classList.toggle('active');
        }

        // Password visibility toggle
        document.querySelectorAll('.togglePasswordVisibility').forEach(button => {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
                const input = button.previousElementSibling;
                input.type = input.type === 'password' ? 'text' : 'password';
            });
        });

        // SweetAlert for session messages
        @if(session('sweet_alert'))
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: '{{ session('sweet_alert.type') }}',
                    title: '{{ session('sweet_alert.title') }}',
                    text: '{{ session('sweet_alert.text') }}',
                    confirmButtonColor: '#003844'
                });
            });
        @endif
    </script>
</body>
</html>