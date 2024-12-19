@extends('layouts.app')

@section('title', 'Bienvenido al Gestor de Categorías')

@section('content')
<div class="text-center text-white" style="position: relative; z-index: 2;">
    <h1 class="display-3 fw-bold" style="text-transform: uppercase; letter-spacing: 2px;">
        ¡Bienvenido a tu Gestor de Categorías!
    </h1>
    <p class="h5 mt-3" style="font-weight: bold; color: #FFD700;">
        Aquí podrás elegir qué categorías de superhéroe deseas a partir del idioma que quieras.
    </p>
    <div class="mt-4">
        <a href="{{ route('languages.index') }}" class="btn btn-primary btn-lg mx-2" style="text-transform: uppercase;">
            <i class="bi bi-translate"></i> Ver Idiomas
        </a>
        <a href="{{ route('categories.index') }}" class="btn btn-danger btn-lg mx-2" style="text-transform: uppercase;">
            <i class="bi bi-list-ul"></i> Ver Categorías
        </a>
    </div>
</div>

<!-- Fondo de imagen con overlay oscuro y animación -->
<style>
    body {
        background: linear-gradient(
                rgba(0, 0, 0, 0.5), 
                rgba(0, 0, 0, 0.5)
            ),
            url('/images/marvel_rivals.jpg') no-repeat center center fixed;
        background-size: cover;
        animation: moveBackground 10s infinite alternate ease-in-out;
    }

    .navbar {
        background: rgba(0, 0, 0, 0.7) !important;
    }

    .container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }

    h1 {
        font-size: 3.5rem;
    }

    p {
        font-size: 1.2rem;
    }

    /* Animación del fondo */
    @keyframes moveBackground {
        0% {
            background-position: center top;
        }
        100% {
            background-position: center bottom;
        }
    }
</style>
@endsection
