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
            <h1 class="text-xl font-bold text-white">REGISTER</h1>
            <a href="{{ route('login') }}" class="text-xl font-bold text-gray-400 hover:text-white">LOGIN</a>
        </div>

        <form class="space-y-4" action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="name" class="mb-1 block text-xs font-medium uppercase text-white">Username</label>
        <input
            id="name"
            name="name"
            type="text"
            class="w-full rounded bg-white/20 p-3 text-white placeholder-gray-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder=""
            required
        >
    </div>

    <div>
        <label for="email" class="mb-1 block text-xs font-medium uppercase text-white">Email</label>
        <input
            id="email"
            name="email"
            type="email"
            class="w-full rounded bg-white/20 p-3 text-white placeholder-gray-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder=""
            required
        >
    </div>

    <div>
        <label for="password" class="mb-1 block text-xs font-medium uppercase text-white">Password</label>
        <input
            id="password"
            name="password"
            type="password"
            class="w-full rounded bg-white/20 p-3 text-white placeholder-gray-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder=""
            required
        >
    </div>

    <div>
        <label for="password_confirmation" class="mb-1 block text-xs font-medium uppercase text-white">Confirm Password</label>
        <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            class="w-full rounded bg-white/20 p-3 text-white placeholder-gray-300 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder=""
            required
        >
    </div>

    <div>
        <label for="role" class="mb-1 block text-xs font-medium uppercase text-white">Role</label>
        <select
            id="role"
            name="role"
            class="w-full rounded bg-black/20 p-3 text-white placeholder-orange-600 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
        >
            <option value="User">User</option>
            <option value="Admin">Admin</option>
            <option value="Agent">Agent</option>
        </select>
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