@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-lg border-4 border-resolved p-8 text-center">
        <svg class="w-20 h-20 text-resolved mx-auto mb-6" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
        </svg>
        
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Paiement réussi !</h1>
        <p class="text-gray-600 mb-8">Félicitations ! Vous êtes maintenant un utilisateur Premium et pouvez créer un nombre illimité de tickets.</p>
        
        <a href="{{ route('tickets.create') }}" class="inline-block bg-bleuciel text-white py-3 px-8 rounded-xl shadow-lg border-2 border-bleuciel-light font-semibold mr-4">
            Créer un ticket
        </a>
        
        <a href="{{ route('dashboard') }}" class="inline-block bg-gray-200 text-gray-800 py-3 px-8 rounded-xl shadow-lg border-2 border-gray-300 font-semibold">
            Retour au tableau de bord
        </a>
    </div>
</div>
@endsection
