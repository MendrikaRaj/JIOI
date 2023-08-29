<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Gestionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function logAdmin(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'mdp' => 'required'
        ]);
        $user = Admin::where('email', '=', $request->email)->first();
        if ($user) {
            if ($request->mdp == $user->mdp) {
                # code...
                $request->session()->put('AdminId', $user->id);
                return redirect('/index_Admin');
            } else {
                return back()->with('fail', 'Mot de passe incorrect');
            }
        } else {
            return back()->with('fail', 'Cette Email n\'existe pas dans notre base');
        }
    }

    public function logoutAdmin()
    {
        # code...
        if (Session::has('AdminId')) {
            # code...
            Session::pull('AdminId');
            return redirect('/');
        }
    }
    //----------------------------------------------------------------

    //Employe
    //----------------------------------------------------------------
    public function logGestionnaire(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'mdp' => 'required'
        ]);
        $user = Gestionnaire::where('email', '=', $request->email)->first();
        if ($user) {
            if ($request->mdp == $user->mdp) {
                # code...
                $request->session()->put('gestionnaireId', $user->id);
                return redirect('/index_Gestionnaire');
            } else {
                return back()->with('fail', 'Mot de passe incorrect');
            }
        } else {
            return back()->with('fail', 'Cette Email n\'est pas encore enregistrer');
        }
    }

    public function logoutGestionnaire()
    {
        # code...
        if (Session::has('gestionnaireId')) {
            # code...
            Session::pull('gestionnaireId');
            return redirect('/Gestionnaire');
        }
    }
}
