<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'genre', 'paysid', 'disciplineid'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'nom' => 'required',
            'genre' => 'required|numeric',
            'paysid' => 'required|numeric',
            'disciplineid' => 'required|numeric'
        ];

        $messages = [
            'nom.required' => 'S\'il vous plait remplissez ce champ',
            'paysid.required' => 'S\'il vous plait remplissez ce champ',
            'disciplineid.required' => 'S\'il vous plait remplissez ce champ'

        ];

        return compact('rules', 'messages');
    }
}
