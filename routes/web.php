<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PDFController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('Accuiel');
Route::get('/about',[App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/activites',[App\Http\Controllers\HomeController::class, 'activites'])->name('activites');
Route::get('/showActivite/{id}',[App\Http\Controllers\HomeController::class, 'showActivite'])->name('showActivite');
Route::get('/showProjet/{id}',[App\Http\Controllers\HomeController::class, 'showProjet'])->name('showProjet');
Route::get('/projet',[App\Http\Controllers\HomeController::class, 'projets'])->name('projet');
Route::get('/soutenezNous',[App\Http\Controllers\HomeController::class, 'soutenezNous'])->name('soutenezNous');
Route::get('/getInsc',[App\Http\Controllers\HomeController::class, 'getInsc'])->name('getInsc');

// info_routes
Route::get('/info', [App\Http\Controllers\InfoController::class, 'edit'])->name('info');
Route::post('/info/update/{id}', [App\Http\Controllers\InfoController::class, 'update'])->name('info/update');


// team _ routes
Route::get('teams', [App\Http\Controllers\TeamController::class, 'index'])->name('teams');
Route::get('team/create', [App\Http\Controllers\TeamController::class, 'create'])->name('team/create');
Route::post('team/store', [App\Http\Controllers\TeamController::class, 'store'])->name('team/store');
Route::get('team/edit/{id}', [App\Http\Controllers\TeamController::class, 'edit'])->name('team/edit');
Route::post('team/update/{id}', [App\Http\Controllers\TeamController::class, 'update'])->name('team/update');
Route::get('team/destroy/{id}', [App\Http\Controllers\TeamController::class, 'destroy'])->name('team/destroy');
    // GENERTE PDF
    Route::get('fiche_member/{id}', [App\Http\Controllers\TeamController::class, 'generatePDF'])->name('fiche_member');

//projet _ routes
 Route::get('projets', [App\Http\Controllers\ProjetController::class, 'index'])->name('projets');
 Route::get('projet/create', [App\Http\Controllers\ProjetController::class, 'create'])->name('projet/create');
 Route::post('projet/store', [App\Http\Controllers\ProjetController::class, 'store'])->name('projet/store');
 Route::get('projet/show/{id}', [App\Http\Controllers\ProjetController::class, 'show'])->name('projet/show');
 Route::get('projet/edit/{id}', [App\Http\Controllers\ProjetController::class, 'edit'])->name('projet/edit');
 Route::post('projet/update/{id}', [App\Http\Controllers\ProjetController::class, 'update'])->name('projet/update');
 Route::get('projet/destroy/{id}', [App\Http\Controllers\ProjetController::class, 'destroy'])->name('projet/destroy');


 //activite_routes
 Route::get('activite', [App\Http\Controllers\ActiviteController::class, 'index'])->name('activite');
 Route::get('activite/create', [App\Http\Controllers\ActiviteController::class, 'create'])->name('activite/create');
 Route::post('activite/store', [App\Http\Controllers\ActiviteController::class, 'store'])->name('activite/store');
 Route::get('activite/show/{id}', [App\Http\Controllers\ActiviteController::class, 'show'])->name('activite/show');
 Route::get('activite/edit/{id}', [App\Http\Controllers\ActiviteController::class, 'edit'])->name('activite/edit');
 Route::post('activite/update/{id}', [App\Http\Controllers\ActiviteController::class, 'update'])->name('activite/update');
 Route::get('activite/destroy/{id}', [App\Http\Controllers\ActiviteController::class, 'destroy'])->name('activite/destroy');

 //partenaire_routes
 Route::get('partenaires', [App\Http\Controllers\PartenaireController::class, 'index'])->name('partenaires');
 Route::get('partenaire/create', [App\Http\Controllers\PartenaireController::class, 'create'])->name('partenaire/create');
 Route::post('partenaire/store', [App\Http\Controllers\PartenaireController::class, 'store'])->name('partenaire/store');
 Route::get('partenaire/show/{id}', [App\Http\Controllers\PartenaireController::class, 'show'])->name('partenaire/show');
 Route::get('partenaire/edit/{id}', [App\Http\Controllers\PartenaireController::class, 'edit'])->name('partenaire/edit');
 Route::post('partenaire/update/{id}', [App\Http\Controllers\PartenaireController::class, 'update'])->name('partenaire/update');
 Route::get('partenaire/destroy/{id}', [App\Http\Controllers\PartenaireController::class, 'destroy'])->name('partenaire/destroy');


 //Clubs_routes
 Route::get('clubs', [App\Http\Controllers\ClubController::class, 'index'])->name('clubs');
 Route::get('club/create', [App\Http\Controllers\ClubController::class, 'create'])->name('club/create');
 Route::post('club/store', [App\Http\Controllers\ClubController::class, 'store'])->name('club/store');
 Route::get('club/show/{id}', [App\Http\Controllers\ClubController::class, 'show'])->name('club/show');
 Route::get('club/edit/{id}', [App\Http\Controllers\ClubController::class, 'edit'])->name('club/edit');
 Route::post('club/update/{id}', [App\Http\Controllers\ClubController::class, 'update'])->name('club/update');
 Route::get('club/destroy/{id}', [App\Http\Controllers\ClubController::class, 'destroy'])->name('club/destroy');

 //Adherent_routes
 Route::get('adherents', [App\Http\Controllers\AdherentController::class, 'index'])->name('adherents');
 Route::get('adherent/create', [App\Http\Controllers\AdherentController::class, 'create'])->name('adherent/create');
 Route::post('adherent/store', [App\Http\Controllers\AdherentController::class, 'store'])->name('adherent/store');
 Route::get('adherent/show/{id}', [App\Http\Controllers\AdherentController::class, 'show'])->name('adherent/show');
 Route::get('adherent/edit/{id}', [App\Http\Controllers\AdherentController::class, 'edit'])->name('adherent/edit');
 Route::post('adherent/update/{id}', [App\Http\Controllers\AdherentController::class, 'update'])->name('adherent/update');
 Route::get('adherent/destroy/{id}', [App\Http\Controllers\AdherentController::class, 'destroy'])->name('adherent/destroy');

 //Media_routes
 Route::get('medias', [App\Http\Controllers\MediaController::class, 'index'])->name('medias');
 Route::get('media/create', [App\Http\Controllers\MediaController::class, 'create'])->name('media/create');
 Route::post('media/store', [App\Http\Controllers\MediaController::class, 'store'])->name('media/store');
 Route::get('media/show/{id}', [App\Http\Controllers\MediaController::class, 'show'])->name('media/show');
 Route::get('media/edit/{id}', [App\Http\Controllers\MediaController::class, 'edit'])->name('media/edit');
 Route::post('media/update/{id}', [App\Http\Controllers\MediaController::class, 'update'])->name('media/update');
 Route::get('media/destroy/{id}', [App\Http\Controllers\MediaController::class, 'destroy'])->name('media/destroy');
