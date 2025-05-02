@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-lg border-4 border-high p-8 text-center">
        <svg class="w-20 h-20 text-high mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Paiement annulé</h1>
        <p class="text-gray-600 mb-8">Votre paiement a été annulé. Vous pouvez réessayer quand vous le souhaitez.</p>
        
        <a href="{{ route('payment.show') }}" class="inline-block bg-bleuciel text-white py-3 px-8 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold mr-4">
            Réessayer
        </a>
        
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-200 text-gray-800 py-3 px-8 rounded-xl shadow-lg border-2 border-gray-300 font-semibold">
            Retour au tableau de bord
        </a>
    </div>
</div>
@endsection
