<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendrier extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'siteid', 'disciplineid'];

    public static function getValidationRules($id = null)
    {
        $rules = [
            'date' => 'required',
            'siteid' => 'required|numeric',
            'disciplineid' => 'required|numeric'
        ];

        $messages = [
            'date.required' => 'S\'il vous plait remplissez ce champ',
            'siteid.required' => 'S\'il vous plait remplissez ce champ',
            'disciplineid.required' => 'S\'il vous plait remplissez ce champ'

        ];

        return compact('rules', 'messages');
    }
}
