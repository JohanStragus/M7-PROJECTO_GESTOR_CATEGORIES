<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    // Mostrar lista de idiomas
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('languages.create');
    }

    // Guardar un nuevo idioma
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:languages',
        ]);

        Language::create($request->all());
        return redirect()->route('languages.index')->with('success', 'Idioma creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    // Actualizar idioma existente
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'code' => 'required|string|max:10|unique:languages,code,' . $language->id,
        ]);

        $language->update($request->all());
        return redirect()->route('languages.index')->with('success', 'Idioma actualizado correctamente.');
    }

    // Eliminar un idioma
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('success', 'Idioma eliminado correctamente.');
    }
}

