@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-header">
        <h1>Crear Categoría</h1>
    </div>
    <form action="{{ route('categories.store') }}" method="POST" class="form">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Título:</label>
            <input type="text" name="title" id="title" required class="form-control" placeholder="Ejemplo: Superhéroe">
        </div>
        <div class="form-group">
            <label for="lang_id" class="form-label">Idioma:</label>
            <select name="lang_id" id="lang_id" required class="form-control">
                @foreach ($languages as $language)
                    <option value="{{ $language->id }}">{{ $language->code }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="user_id" value="1"> {{-- Cambiar a usuario autenticado --}}
        <div class="form-buttons">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-circle"></i> Guardar
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Cancelar
            </a>
        </div>
    </form>
</div>

<style>
    /* Fondo del cuerpo */
    body {
        background: linear-gradient(to bottom, #141E30, #243B55); /* Fondo degradado */
        color: #f8f9fa;
        margin: 0;
        font-family: 'Roboto', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    /* Navbar */
    .navbar {
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1000;
        background-color: rgba(0, 0, 0, 0.9); /* Fondo oscuro translúcido */
        padding: 10px 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .navbar .navbar-brand img {
        height: 40px; /* Tamaño del logo */
    }

    .navbar .nav-item a {
        color: #f8f9fa;
        font-weight: bold;
        text-transform: uppercase;
        margin-right: 15px;
        text-decoration: none;
    }

    .navbar .nav-item a:hover {
        color: #FFD700; /* Color dorado al pasar el ratón */
    }

    /* Contenedor del formulario */
    .form-container {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 450px;
        padding: 30px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: slideUp 0.8s ease-out; /* Animación de aparición */
    }

    /* Encabezado del formulario */
    .form-header {
        text-align: center;
        background: linear-gradient(to right, #4CA1AF, #2C3E50); /* Fondo del encabezado */
        padding: 15px;
        border-radius: 12px 12px 0 0;
        margin: -30px -30px 20px -30px; /* Extiende fuera del contenedor */
    }

    .form-header h1 {
        font-size: 1.8rem;
        color: #ffffff;
        font-weight: bold;
        margin: 0;
    }

    /* Inputs y labels */
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333333;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 8px;
        color: #333333;
    }

    .form-control:focus {
        border-color: #4CA1AF;
        box-shadow: 0 0 10px rgba(76, 161, 175, 0.5);
        outline: none;
    }

    .form-control::placeholder {
        color: #999999;
    }

    /* Botones */
    .form-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn {
        text-transform: uppercase;
        font-weight: bold;
        padding: 10px 20px;
        font-size: 0.9rem;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #4CA1AF;
        border: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: #2C3E50;
        transform: scale(1.05);
    }

    .btn-secondary {
        background-color: #f8f9fa;
        border: 1px solid #ccc;
        color: #333333;
    }

    .btn-secondary:hover {
        background-color: #e1e1e1;
        transform: scale(1.05);
    }

    /* Animación de aparición */
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translate(-50%, 50%); /* Comienza más abajo */
        }
        to {
            opacity: 1;
            transform: translate(-50%, -50%); /* Termina centrado */
        }
    }
</style>
@endsection
