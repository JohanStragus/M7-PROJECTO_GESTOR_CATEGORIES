<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryLanguage extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = ['category_id', 'lang_id', 'title'];

    // Relación con Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relación con Language
    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id');
    }
}
