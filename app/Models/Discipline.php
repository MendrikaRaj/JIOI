<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'type', 'code'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'nom' => 'required',
            'type' => 'required|numeric',
            'code' => 'required'
        ];

        $messages = [
            'nom.required' => 'S\'il vous plait remplissez ce champ',
            'type.required' => 'S\'il vous plait remplissez ce champ',
            'code.required' => 'S\'il vous plait remplissez ce champ',
        ];

        return compact('rules', 'messages');
    }
}
