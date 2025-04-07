<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <!-- Styles -->
    <!-- @vite('resources/css/app.css') -->
    
    <style>
        .auth-bg {
            background-image: url('/images/background.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#0f1729]">
    <div class="w-full max-w-md p-8 rounded-lg shadow-lg relative overflow-hidden auth-bg">
        <!-- Overlay pour assombrir l'image de fond -->
        <div class="absolute inset-0 bg-[#1a2542]/80 backdrop-blur-sm"></div>
        
        <div class="relative z-10">
            <!-- Onglets -->
            <div class="flex mb-6 border-b border-gray-700">
                <a href="{{ route('register') }}" class="pb-2 px-4 font-medium text-sm text-gray-400">
                    REGISTER
                </a>
                <a href="{{ route('login') }}" class="pb-2 px-4 font-medium text-sm text-blue-400 border-b-2 border-blue-400">
                    LOGIN
                </a>
            </div>

            <!-- Formulaire de connexion -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                
                <div>
                    <input type="email" name="email" placeholder="Email" class="