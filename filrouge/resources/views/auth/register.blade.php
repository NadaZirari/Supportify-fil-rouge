<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-tech-pattern {
            background-image: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/register%20fil%20rouge-h9xztZfyrSORCsy7uG6NSz5wfcZgLG.png');
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
            <h1 class="text-xl font-bold text-white">REGISTER</h1>
            <a href="#" class="text-xl font-bold text-gray-400 hover:text-white">LOGIN</a>
        </div>

        <form class="space-y-4">
            <div>
                <label for="username" class="mb-1 block text-xs font-medium uppercase text-white">Username</label>
                <input
                    id="username"
                    type="text"
                    class="w-full rounded bg-white/20 p-3 text-white placeholder-gray-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder=""
                >
            </div>

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

            <div class="relative">
                <label for="role" class="mb-1 block text-xs font-medium uppercase text-white">Role</label>
                <button
                    type="button"
                    id="roleDropdown"
                    class="dropdown-toggle flex w-full items-center justify-between rounded bg-white/20 p-3 text-left text-white backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onclick="toggleDropdown()"
                >
                    <span id="selectedRole"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <div id="roleDropdownMenu" class="dropdown-menu absolute z-10 mt-1 hidden w-full rounded-md bg-[#2a3552] shadow-lg">
                    <div class="py-1">
                        <button
                            type="button"
                            class="block w-full px-4 py-2 text-left text-white hover:bg-[#3a4562]"
                            onclick="selectRole('User')"
                        >
                            User
                        </button>
                        <button
                            type="button"
                            class="block w-full px-4 py-2 text-left text-white hover:bg-[#3a4562]"
                            onclick="selectRole('Admin')"
                        >
                            Admin
                        </button>
                        <button
                            type="button"
                            class="block w-full px-4 py-2 text-left text-white hover:bg-[#3a4562]"
                            onclick="selectRole('Developer')"
                        >
                            Developer
                        </button>
                    </div>
                </div>
            </div>

            <button
                type="submit"
                class="mt-6 w-full rounded-md bg-[#ff6b45] p-3 text-center font-medium text-white hover:bg-[#ff5a30] focus:outline-none focus:ring-2 focus:ring-[#ff6b45] focus:ring-offset-2"
            >
                REGISTER
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

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('roleDropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        function selectRole(role) {
            document.getElementById('selectedRole').textContent = role;
            document.getElementById('roleDropdownMenu').classList.add('hidden');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!document.getElementById('roleDropdown').contains(e.target)) {
                document.getElementById('roleDropdownMenu').classList.add('hidden');
            }
        });
    </script>
</body>
</html>