<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RangAthlete extends Model
{
    use HasFactory;
    protected $fillable = ['rang', 'athleteid'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'rang' => 'required|numeric',
            'athleteid' => 'required|numeric'
        ];

        $messages = [
            'rang.required' => 'S\'il vous plait remplissez ce champ',
            'athleteid.required' => 'S\'il vous plait veuillez ajouter une image',
        ];

        return compact('rules', 'messages');
    }
}
