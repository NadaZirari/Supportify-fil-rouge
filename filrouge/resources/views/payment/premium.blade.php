@extends('layouts.app')

@section('content')
<style>
    
    :root {
        --bleuciel: #1E90FF;
        --bleuciel-light: #4DA8FF; 
        --resolved: #34D399; 
        --background-card: #F9FAFB; 
    }

   
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }

   
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(30, 144, 255, 0.3);
    }
</style>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-10 mb-10 transform transition-all duration-300 fade-in">
        <h1 class="text-4xl font-extrabold text-center text-bleuciel mb-10 tracking-tight">
            Passez à <span class="text-gray-800">Supportify Premium</span>
        </h1>

        <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
            
            <!-- Section prix et paiement -->
            <div class="bg-background-card rounded-2xl p-8 text-center w-full lg:w-1/3 shadow-lg transform transition-all duration-300 hover:scale-105">
                <p class="text-gray-500 text-sm mb-3 uppercase tracking-wider">Prix unique</p>
                <p class="text-4xl font-extrabold text-bleuciel mb-6">19,99€</p>

                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-bleuciel text-white py-4 px-6 rounded-xl font-semibold text-lg transition-all duration-300 btn-premium">
                        Payer maintenant
                    </button>
                </form>

                <p class="text-gray-500 text-sm mt-4">
                    Paiement sécurisé avec <span class="font-semibold">Stripe</span>
                </p>
            </div>
        </div>
    </div>
</div>

<!--  typographie moderne -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

<style>
 
    body {
        font-family: 'Inter', sans-serif;
    }
</style>
@endsection