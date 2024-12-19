<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = ['code'];

    // Relación con CategoryLanguage
    public function categoryLanguages()
    {
        return $this->hasMany(CategoryLanguage::class, 'lang_id');
    }
}
