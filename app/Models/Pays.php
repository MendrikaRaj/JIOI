<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'photo'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'nom' => 'required',
            'photo' => $id ? 'sometimes|image|mimes:jpeg,png,jpg,webp|max:5048' : 'required|image|mimes:jpeg,png,jpg,webp|max:5048'
        ];

        $messages = [
            'nom.required' => 'S\'il vous plait remplissez ce champ',
            'photo.required' => 'S\'il vous plait veuillez ajouter une image',
        ];

        return compact('rules', 'messages');
    }
}
