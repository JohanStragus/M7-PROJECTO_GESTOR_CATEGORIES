<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Models\CategoryLanguage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Mostrar lista de categorías
    public function index()
    {
        $categories = Category::with('translations.language')->get();
        return view('categories.index', compact('categories'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $languages = Language::all();
        return view('categories.create', compact('languages'));
    }

    // Guardar una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:45',
            'lang_id' => 'required|exists:languages,id',
        ]);

        $category = Category::create(['user_id' => $request->user_id]);

        CategoryLanguage::create([
            'category_id' => $category->id,
            'lang_id' => $request->lang_id,
            'title' => $request->title,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría creada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Category $category)
    {
        $languages = Language::all();
        $categoryLanguage = $category->translations->first(); // Solo un idioma por simplicidad
        return view('categories.edit', compact('category', 'languages', 'categoryLanguage'));
    }

    // Actualizar una categoría existente
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:45',
            'lang_id' => 'required|exists:languages,id',
        ]);

        $categoryLanguage = $category->translations->first();
        $categoryLanguage->update([
            'lang_id' => $request->lang_id,
            'title' => $request->title,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría actualizada correctamente.');
    }

    // Eliminar una categoría
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada correctamente.');
    }
}

