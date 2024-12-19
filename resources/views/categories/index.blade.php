@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="header-section text-center mb-4">
    <h1 class="display-4 fw-bold text-white">Categorías</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle"></i> Añadir Categoría
    </a>
</div>

<div class="categories-grid">
    @foreach ($categories as $category)
        <div class="card category-card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->translations->first()->title ?? 'Sin Título' }}</h5>
                <p class="card-text">
                    <strong>Idioma:</strong> {{ $category->translations->first()->language->code ?? 'Desconocido' }}
                </p>
                <div class="card-actions">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    /* Fondo de la sección */
    html {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background: linear-gradient(to right, #16222A, #3A6073); /* Fondo moderno */
        color: white;
        margin: 0;
        padding: 0;
    }

    .header-section {
        margin-bottom: 30px;
        padding: 20px;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin: 0 auto;
        max-width: 1200px;
        padding: 20px;
        flex: 1;
    }

    /* Estilo de las tarjetas */
    .category-card {
        background: white;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Contenido de las tarjetas */
    .card-body {
        padding: 20px;
        text-align: center;
    }

    .card-title {
        font-size: 1.5rem;
        color: #16222A;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 1rem;
        color: #3A6073;
        margin-bottom: 15px;
    }

    .card-actions {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    /* Botones */
    .btn {
        border-radius: 20px;
        text-transform: uppercase;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        color: white;
        background: #3A6073;
    }

    .btn-outline-danger:hover {
        color: white;
        background: #A71D2A;
    }

    .btn-primary {
        background-color: #3A6073;
        border: none;
        padding: 10px 20px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #16222A;
    }

    footer {
        background: rgba(0, 0, 0, 0.85);
        color: #f8f9fa;
        padding: 20px 0;
        text-align: center;
        font-size: 0.9rem;
        margin-top: auto;
        width: 100%;
    }

    footer a {
        color: #FFD700;
        text-decoration: none;
        font-weight: bold;
    }

    footer a:hover {
        text-decoration: underline;
    }
</style>
@endsection
