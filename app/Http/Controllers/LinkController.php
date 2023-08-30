<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Calendrier;
use App\Models\CalendrierUser;
use App\Models\Categorie;
use App\Models\CategorieDetail;
use App\Models\Difference;
use App\Models\Discipline;
use App\Models\Medaille;
use App\Models\Pays;
use App\Models\Resultat;
use App\Models\Site;
use App\Models\V_athlete;
use App\Models\V_mouvement;
use App\Models\V_mouvement_detail;
use App\Models\V_rang_athlete;
use App\Models\V_resultat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LinkController extends Controller
{
    ///Lien site Admin///
    public function index_Admin()
    {
        if (Session::has('AdminId')) {
            return view('Admin.index');
        }
        return redirect('/');
    }
    function pays()
    {
        if (Session::has('AdminId')) {
            $pays = Pays::all();
            return view('Admin.pays', compact('pays'));
        }
        return redirect('/');
    }
    function discipline()
    {
        if (Session::has('AdminId')) {
            $discipline = Discipline::all();
            return view('Admin.discipline', compact('discipline'));
        }
        return redirect('/');
    }
    function athlete()
    {
        if (Session::has('AdminId')) {
            $pays = Pays::all();
            $discipline = Discipline::where('type', '=', 0)->get();
            $athlete = Athlete::all();
            return view('Admin.athlete', compact('discipline', 'pays', 'athlete'));
        }
        return redirect('/');
    }
    function site()
    {
        if (Session::has('AdminId')) {
            $site = Site::all();
            return view('Admin.site', compact('site'));
        }
        return redirect('/');
    }
    function categorie()
    {
        if (Session::has('AdminId')) {
            $categorieDetail = CategorieDetail::all();
            $categorie = Categorie::all();
            return view('Admin.categorieDetail', compact('categorieDetail', 'categorie'));
        }
        return redirect('/');
    }

    ///Lien site Gestionnaire///
    public function index_Gestionnaire()
    {
        if (Session::has('gestionnaireId')) {
            return view('Gestionnaire.index');
        }
        return redirect('/');
    }
    function calendrier()
    {
        if (Session::has('gestionnaireId')) {
            $calendrier = Calendrier::all();
            $site = Site::all();
            $discipline = Discipline::all();
            return view('Gestionnaire.calendrier', compact('site', 'discipline', 'calendrier'));
        }
        return redirect('/');
    }
    function resultat_collectif()
    {
        if (Session::has('gestionnaireId')) {
            $pays = Pays::all();
            $discipline = Discipline::where('type', '=', 1)->get();
            $resultat = V_resultat::where('type', '=', 1)->get();;
            return view('Gestionnaire.resultat-collectif', compact('pays', 'discipline', 'resultat'));
        }
        return redirect('/');
    }
    function resultat_individuel()
    {
        if (Session::has('gestionnaireId')) {
            $athlete  = V_athlete::all();
            $rangAthlete  = V_rang_athlete::all();
            return view('Gestionnaire.resultat-individuelle', compact('athlete', 'rangAthlete'));
        }
        return redirect('/');
    }
    function importDR()
    {
        if (Session::has('gestionnaireId')) {
            $mouvement = V_mouvement_detail::all();
            return view('Gestionnaire.importDR', compact('mouvement'));
        }
        return redirect('/');
    }

    ///Lien site User///
    public function index_User()
    {
        return view('User.index');
    }
    function calendrier_User()
    {
        $calendrier = CalendrierUser::all();
        $discipline = Discipline::all();
        return view('User.calendrier', compact('calendrier', 'discipline'));
    }
    function medaille()
    {
        $medaille = Medaille::all();
        return view('User.medaille', compact('medaille'));
    }
    function tableau()
    {
        $mouvement = V_mouvement::all();
        return view('User.tableau', compact('mouvement'));
    }
}
