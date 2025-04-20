<!-- resources/views/layouts/admin.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">

@include('partials.sidebaradmin')

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-gray-800 rounded-lg p-4">
                <!-- Top Navigation -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Dashboard</h1>
                    <div class="flex items-center">
                        <!-- Vous pouvez ajouter un bouton de déconnexion ou d'autres informations ici -->
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-md">Déconnexion</button>
                    </div>
                </div>

                <!-- Main Content Here -->
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
