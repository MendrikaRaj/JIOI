<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $fillable = ['nom'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'nom' => 'required'
        ];

        $messages = [
            'nom.required' => 'S\'il vous plait remplissez ce champ',
        ];

        return compact('rules', 'messages');
    }
}
