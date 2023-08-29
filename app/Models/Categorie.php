<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['type'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'type' => 'required'
        ];

        $messages = [
            'type.required' => 'S\'il vous plait remplissez ce champ'
        ];

        return compact('rules', 'messages');
    }
}
