<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar - Supportify</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <header class="flex justify-between items-center p-5 bg-white">
    <a href="{{ route('home') }}" class="flex items-center text-xl font-bold text-blue-900">
        <i class="fas fa-headset text-blue-500 mr-2"></i>
        Supportify
    </a>
    
    <nav>
        <ul class="flex space-x-8">
            <li><a href="{{ route('fonctionnalite') }}" class="text-black hover:text-gray-500 text-sm font-semibold transition-colors">Fonctionnalités</a></li>
            <li><a href="{{ route('solutions') }}" class="text-black hover:text-gray-500 text-sm font-semibold transition-colors">Solutions</a></li>
            <li><a href="{{ route('temoignage') }}" class="text-black hover:text-gray-500 text-sm font-semibold transition-colors">Témoignages</a></li>
        </ul>
    </nav>
    
    <a href="{{ route('register') }}" class="inline-block px-6 py-2 bg-blue-900 text-white rounded-full text-sm font-semibold transition-all hover:bg-green-600">Démarrer</a>
</header>

</body>
</html>
