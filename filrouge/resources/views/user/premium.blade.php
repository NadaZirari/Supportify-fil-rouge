
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supportify - Système de tickets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sidebar': '#1e293b',
                        'main-bg': '#0f172a',
                        'btn-blue': '#3b82f6',
                        'high': '#ef4444',
                        'medium': '#f59e0b',
                        'low': '#10b981',
                        'active': '#10b981',
                        'closed': '#f59e0b'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-main-bg text-white flex h-screen">
    
        @include('partials.sidebaruser')

<div class="max-w-3xl mx-auto py-16 px-6">
    <div class="bg-white shadow-xl rounded-2xl p-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Passez en mode Premium</h1>
        <p class="text-gray-600 mb-6">
            Avec l'abonnement Premium, vous pouvez soumettre un nombre illimité de tickets et bénéficier d'un support prioritaire.
        </p>

        <div class="border-t border-b py-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">Avantages Premium</h2>
            <ul class="text-left space-y-2 text-gray-600">
                <li>✔️ Soumission illimitée de tickets</li>
                <li>✔️ Support prioritaire</li>
                <li>✔️ Mises à jour exclusives</li>
            </ul>
        </div>

        <a href="{{ route('user.upgrade') }}"
           class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-xl transition">
            Devenir Premium maintenant
        </a>

        @if(session('success'))
            <div class="mt-6 text-green-600 font-medium">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

</main>
    </div>
</body>
</html>