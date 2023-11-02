<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\GroupeController;
use  App\Http\Controllers\FiliereController;
use  App\Http\Controllers\CourseController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');});
    
    Route::middleware(['auth','role:admin'])->group(function () {
Route::resource('etudiants' , EtudiantController::class);
Route::get('edit/{id}','EtudiantController@edit');
Route::get('/search'  ,'EtudiantController@search')->name("search");
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::post('update/{id}','EtudiantController@update');
     


Route::resource('enseignants' , EnseignantController::class);
Route::get('edit/{id}','EnseignantController@edit');
Route::post('update/{id}','EnseignantController@update');
Route::get('/enseignants', [EnseignantController::class, 'index'])->name('enseignants.index');




Route::resource('absences' , AbsenceController::class);
Route::get('/absences/create/{id_Etudiant}', [AbsenceController::class, 'create'])->name('absences.create');
Route::get('edit/{id}','AbsenceController@edit');
Route::post('update/{id}','AbsenceController@update');
Route::post('/absences/destroyMultiple', [AbsenceController::class, 'destroyMultiple'])->name('absences.destroyMultiple');
Route::get('/absences/{id}', [AbsenceController::class, 'show'])->name('absences.show');
Route::get('/absences', [AbsenceController::class, 'indexa'])->name('absences.index');



Route::resource('notes' , NoteController::class);
Route::get('edit/{id}','NoteController@editn');
Route::post('update/{id}','NoteController@updaten');


Route::resource('courses', CourseController::class);
Route::get('edit/{id}', 'CourseController@editc');
Route::post('update/{id}', 'CourseController@updatec');




Route::resource('filieres' , FiliereController::class);
Route::get('edit/{id}','FiliereController@editf');
Route::post('update/{id}','FiliereController@updatef');

Route::resource('groupes' , GroupeController::class);
Route::get('edit/{id}','GroupeController@editg');
Route::post('update/{id}','GroupeController@updateg');

});
Route::resource('absences' , AbsenceController::class);
Route::get('edit/{id}','AbsenceController@edit');
Route::post('update/{id}','AbsenceController@update');

Route::resource('notes' , NoteController::class);
Route::get('notes/create/{id_Etudiant}', [NoteController::class, 'create'])->name('notes.create');
Route::post('notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('edit/{id}','NoteController@editn');
Route::post('update/{id}','NoteController@updaten');



require __DIR__.'/auth.php';
