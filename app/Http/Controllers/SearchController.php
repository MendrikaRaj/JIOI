<?php

namespace App\Http\Controllers;

use App\Models\CalendrierUser;
use App\Models\Discipline;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    function filtreCalendrier(Request $request)
    {
        $discipline = Discipline::all();
        $date = $request->input('date');
        $disciplineid = $request->input('disciplineid');

        $calendrierQuery = CalendrierUser::query();

        if (!empty($date)) {
            $calendrierQuery->whereDate('date', $date);
        }

        if (!empty($disciplineid)) {
            $calendrierQuery->where('disciplineid', $disciplineid);
        }

        $calendrier = $calendrierQuery->get();

        if (empty($date) && empty($disciplineid)) {
            return redirect()->back()->withErrors('Veuillez remplir au moins un champ')->withInput();
        }

        return view('User.calendrier', compact('calendrier', 'discipline'));
    }
}
