<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\RangAthlete;
use App\Models\Resultat;
use App\Models\V_rang_athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CRUDCrontroller extends Controller
{
    //Fonction pour insérer un objet dans la base
    public function inserer(Request $request, $modelName)
    {
        $name = 'App\Models\\' . $modelName;
        $data = $request->all();
        $validationData = $name::getValidationRules();
        $rules = $validationData['rules'];
        $messages = $validationData['messages'];

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->storeAs('public/uploads', $file->getClientOriginalName());
            $data['photo'] = $path;
        }
        $model = new $name($data);
        $res = $model->save();
        $message = $res ? $modelName . ' enregistré avec succès' : 'Enregistrement de ' . $modelName . ' échoué';
        $status = $res ? 'success' : 'error';
        return back()->with($status, $message);
    }


    //Fonction pour mettre à jour les données des tables dans la base
    public function modifier(Request $request, $modelName, $id)
    {
        $name = 'App\Models\\' . $modelName;
        $data = $request->except('id');
        $validationData = $name::getValidationRules($id);
        $rules = $validationData['rules'];
        $messages = $validationData['messages'];

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->storeAs('public/uploads', $file->getClientOriginalName());
            $data['photo'] = $path;
        }
        $model = $name::find($id);
        if (!$model) {
            return back()->with('error', $modelName . ' non trouvé');
        }
        $model->fill($data);
        $res = $model->save();
        $message = $res ? $modelName . ' mise à jour avec succès' : 'Mise à jour de ' . $modelName . ' échouée';
        $status = $res ? 'success' : 'error';
        return back()->with($status, $message);
    }

    //Fonction pour supprimer des données dans la base
    public function supprimer($modelName, $id)
    {
        $name = 'App\Models\\' . $modelName;
        $model = $name::find($id);
        if (!$model) {
            return back()->with('error', $modelName . ' non trouvé');
        }
        $res = $model->delete();
        $message = $res ? $modelName . ' supprimer avec succès' : 'Suppression de ' . $modelName . ' échouée';
        $status = $res ? 'success' : 'error';
        return back()->with($status, $message);
    }
    public function ajout_rang_athlete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rang' => 'required|numeric',
            'athleteid' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $rang = $request->input('rang');
        $athleteid = $request->input('athleteid');

        // Vérifier si l'athlète a déjà un rang
        $existingRang = V_rang_athlete::where('athleteid', $athleteid)->exists();
        if ($existingRang) {
            return back()->with('error', 'Cet athlète a déjà un rang.');
        }

        $athlete = Athlete::where('id', $athleteid)->first();
        if (!$athlete) {
            return back()->with('error', 'Athlète introuvable.');
        }

        // Vérifier si le rang est déjà utilisé pour cette discipline
        $existingRangDiscipline = V_rang_athlete::where('disciplineid', $athlete->disciplineid)
            ->where('rang', $rang)
            ->exists();
        if ($existingRangDiscipline) {
            return back()->with('error', 'Ce rang est déjà pris pour la discipline sélectionnée.');
        }

        // Enregistrer le rang de l'athlète
        RangAthlete::create([
            'rang' => $rang,
            'athleteid' => $athleteid
        ]);

        // Enregistrer le résultat de l'athlète
        Resultat::create([
            'rang' => $rang,
            'disciplineid' => $athlete->disciplineid,
            'paysid' => $athlete->paysid
        ]);

        return back()->with('success', 'Rang de l\'athlète ajouté avec succès.');
    }
    function update_rang_athlete(Request $request, $id)
    {
        $rangAthletes = RangAthlete::find($id);
        $rangAthlete = V_rang_athlete::find($id);

        if (!$rangAthletes) {
            return back()->with('error', 'Donnée introuvable.');
        }

        $validator = Validator::make($request->all(), [
            'rang' => 'required|numeric',
            'athleteid' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $newRang = $request->input('rang');
        $newAthleteid = $request->input('athleteid');

        $oldAthlete = Athlete::where('id', $rangAthletes->athleteid)->first();
        if (!$oldAthlete) {
            return back()->with('error', 'Athlète introuvable.');
        }

        $athlete = Athlete::where('id', $newAthleteid)->first();
        if (!$athlete) {
            return back()->with('error', 'Athlète introuvable.');
        }

        // Check if the new rank is already used for this discipline
        $existingRangDiscipline = V_rang_athlete::where('disciplineid', $athlete->disciplineid)
            ->where('rang', $newRang)
            ->where('athleteid', '<>', $newAthleteid) // Exclude current athlete
            ->exists();
        if ($existingRangDiscipline) {
            return back()->with('error', 'Ce rang est déjà pris pour la discipline sélectionnée.');
        }

        // Update the resutat table //
        $resultat = Resultat::where('disciplineid', $rangAthlete->disciplineid)
            ->where('paysid', $rangAthlete->paysid)
            ->where('rang', $rangAthlete->rang)
            ->first();
        if ($resultat) {
            $resultat->rang = $newRang;
            $resultat->disciplineid = $athlete->disciplineid;
            $resultat->paysid = $athlete->paysid;
            $resultat->save();
        }
        // Update the rank of the athlete
        $rangAthletes->rang = $newRang;
        $rangAthletes->athleteid = $newAthleteid;
        $rangAthletes->save();
        return back()->with('success', 'Rang de l\'athlète mis à jour avec succès.');
    }
    function delete_rang_athlete($id)
    {
        $rangAthlete = V_rang_athlete::find($id);
        $athlete = RangAthlete::find($id);

        if (!$athlete) {
            return back()->with('error', 'Athlète introuvable.');
        }
        if ($athlete) {
            $athlete->delete();
        }
        // Delete the corresponding resultat entry
        Resultat::where('disciplineid', $rangAthlete->disciplineid)
            ->where('paysid', $rangAthlete->paysid)
            ->where('rang', $rangAthlete->rang)
            ->delete();

        return back()->with('success', 'Rang de l\'athlète supprimé avec succès.');
    }
}
