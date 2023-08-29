<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieDetail extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'categorieid', 'code'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'nom' => 'required',
            'categorieid' => 'required|numeric',
            'code' => 'required'
        ];

        $messages = [
            'nom.required' => 'S\'il vous plait remplissez ce champ',
            'categorieid.required' => 'S\'il vous plait remplissez ce champ',
            'code.required' => 'S\'il vous plait remplissez ce champ',
        ];

        return compact('rules', 'messages');
    }
}
