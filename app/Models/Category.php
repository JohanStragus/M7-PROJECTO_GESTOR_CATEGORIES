<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Campos permitidos para asignación masiva
    protected $fillable = ['user_id'];

    // Relación con CategoryLanguage
    public function translations()
    {
        return $this->hasMany(CategoryLanguage::class, 'category_id');
    }

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
