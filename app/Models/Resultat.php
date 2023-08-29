<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;
    protected $fillable = ['rang', 'disciplineid', 'paysid'];

    public static function getValidationRules($id = null)
    {
        $paysCount = Pays::count();
        $customUniqueRule = function ($attribute, $value, $fail) use ($id) {
            $query = self::where('rang', $value);
            if ($id !== null) {
                $query->where('id', '<>', $id);
            }
            if (request()->has('disciplineid')) {
                $query->where('disciplineid', request()->input('disciplineid'));
            }
            if ($query->exists()) {
                $fail("Le rang avec cette discipline est déjà pris.");
            }
        };
        $customPays = function ($attribute, $value, $fail) use ($id) {
            $query = self::where('paysid', request()->input('paysid'));

            if (is_numeric(request()->input('disciplineid'))) {
                $query->where('disciplineid', request()->input('disciplineid'));
            } else {
                $query->where('disciplineid', Discipline::where('nom', request()->input('disciplineid'))->value('id'));
            }

            if ($id !== null) {
                $query->where('id', '<>', $id);
            }

            if ($query->exists()) {
                $fail("Ce pays a déjà un rang dans la discipline sélectionnée");
            }
        };
        $rules = [
            'rang' => ['required', 'numeric', 'max:' . $paysCount, $customUniqueRule, $customPays],
            'disciplineid' => 'required|alpha_num', // Check if it's in discipline ids
            'paysid' => 'required|numeric'
        ];

        $messages = [
            'nom.required' => 'S\'il vous plaît remplissez ce champ',
            'disciplineid.required' => 'S\'il vous plaît remplissez ce champ',
            'paysid.required' => 'S\'il vous plaît remplissez ce champ',
            'rang.numeric' => 'Ce champ doit être un nombre',
            'rang.unique' => 'Ce rang est déjà pris sur cette discipline'
        ];
        if (is_numeric(request()->input('disciplineid'))) {
            $rules['disciplineid'] .= '|numeric';
        } else {
            $rules['disciplineid'] .= '|exists:disciplines,nom';
        }
        return compact('rules', 'messages');
    }
}
