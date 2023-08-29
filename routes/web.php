<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CRUDCrontroller;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Session::has('AdminId')) {
        # code...
        return view('Admin.index');
    }
    return view('Admin.login');
});

//CRUD path
////////////////////////////////
Route::post('/enregistrer/{modelName}', [CRUDCrontroller::class, 'inserer'])->name('enregistrer');
Route::post('/modifier/{modelName}/{id}', [CRUDCrontroller::class, 'modifier'])->name('modifier');
Route::post('/supprimer/{modelName}/{id}', [CRUDCrontroller::class, 'supprimer'])->name('supprimer');
Route::post('/ajout_rang_athlete', [CRUDCrontroller::class, 'ajout_rang_athlete'])->name('ajout_rang_athlete');
Route::post('/update_rang_athlete/{id}', [CRUDCrontroller::class, 'update_rang_athlete'])->name('update_rang_athlete');
Route::post('/delete_rang_athlete/{id}', [CRUDCrontroller::class, 'delete_rang_athlete'])->name('delete_rang_athlete');
////////////////////////////////

///Authentication Admin///
////////////////////////////////
Route::post('/logAdmin', [AuthController::class, 'logAdmin'])->name('logAdmin');
Route::get('/logoutAdmin', [AuthController::class, 'logoutAdmin'])->name('logoutAdmin');
////////////////////////////////
///Authentication Gestionnaire///
////////////////////////////////
Route::post('/logGestionnaire', [AuthController::class, 'logGestionnaire'])->name('logGestionnaire');
Route::get('/logoutGestionnaire', [AuthController::class, 'logoutGestionnaire'])->name('logoutGestionnaire');
////////////////////////////////

///Link site Admin///
Route::get('/index_Admin', [LinkController::class, 'index_Admin'])->name('index_Admin');
Route::get('/pays', [LinkController::class, 'pays'])->name('pays');
Route::get('/discipline', [LinkController::class, 'discipline'])->name('discipline');
Route::get('/athlete', [LinkController::class, 'athlete'])->name('athlete');
Route::get('/site', [LinkController::class, 'site'])->name('site');
Route::get('/categorie', [LinkController::class, 'categorie'])->name('categorie');
////////////////////////////////

Route::get('/Gestionnaire', function () {
    if (Session::has('gestionnaireId')) {
        # code...
        return view('Gestionnaire.index');
    }
    return view('Gestionnaire.login');
});
///Link site Gestionnaire///
Route::get('/index_Gestionnaire', [LinkController::class, 'index_Gestionnaire'])->name('index_Gestionnaire');
Route::get('/calendrier', [LinkController::class, 'calendrier'])->name('calendrier');
Route::get('/resultat_collectif', [LinkController::class, 'resultat_collectif'])->name('resultat_collectif');
Route::get('/resultat_individuel', [LinkController::class, 'resultat_individuel'])->name('resultat_individuel');
Route::get('/importDR', [LinkController::class, 'importDR'])->name('importDR');
////////////////////////////////

///Link User///
Route::get('/Utilisateur', function () {
    return view('User.index');
});
Route::get('/index_User', [LinkController::class, 'index_User'])->name('index_User');
Route::get('/calendrier_User', [LinkController::class, 'calendrier_User'])->name('calendrier_User');
Route::get('/medaille', [LinkController::class, 'medaille'])->name('medaille');
Route::get('/tableau', [LinkController::class, 'tableau'])->name('tableau');

///Search///
Route::post('/filtreCalendrier', [SearchController::class, 'filtreCalendrier'])->name('filtreCalendrier');
////////////////////////////////
///Import///
Route::post('/import_csv', [ImportController::class, 'import_csv'])->name('import_csv');
