<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Note;
use App\Models\Groupe;
use App\Models\Course;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $groupes = Groupe::all();
        $selectedGroup = $request->input('group');
        $selectedGroupe = null;
        $etudiants = collect();
        
        if ($selectedGroup) {
            $selectedGroupe = Groupe::find($selectedGroup);
            $etudiants = Etudiant::where('id_Groupe', $selectedGroup)->get();
        }
        
        return view('indexn', compact('groupes', 'selectedGroup', 'etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id_Etudiant
     * @return \Illuminate\Http\Response
     */
    public function create($id_Etudiant)
    {
        $etudiant = Etudiant::findOrFail($id_Etudiant);
        $selectedGroupe = $etudiant->groupe;
        $selectedEtudiant = $etudiant;
        $courses = Course::all();


        return view('createn', compact('selectedGroupe', 'selectedEtudiant', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_Etudiant' => 'required',
            'id_Groupe' => 'required',
            'id_Course' => 'required',
            'note1' => 'required|numeric',
            'note2' => 'required|numeric',
            'note3' => 'required|numeric',
        ]);
        
        $note = new Note;
        $note->id_Etudiant = $request->input('id_Etudiant');
        $note->id_Groupe = $request->input('id_Groupe');
        $note->id_Course = $request->input('id_Course');
        $note->note1 = $request->input('note1');
        $note->note2 = $request->input('note2');
        $note->note3 = $request->input('note3');
        $note->save();
    
        return redirect("/notes");
    }
    
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        $etudiant = $note->etudiant;
        $courses = Course::all();
    
        return view('shown', compact('note', 'etudiant', 'courses'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $etudiants = Etudiant::all();
        $courses = Course::all();
    
        return view('editn', compact('note', 'etudiants', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'note1' => 'required|numeric',
        'note2' => 'required|numeric',
        'note3' => 'required|numeric',
    ]);

    $note = Note::findOrFail($id);
    $note->note1 = $request->input('note1');
    $note->note2 = $request->input('note2');
    $note->note3 = $request->input('note3');
    $note->save();
    return redirect("/notes")->with('success', 'Notes updated successfully.');
}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
    
        if ($note) {
            $note->delete();
            return redirect()->back()->with('success', 'Note deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'Note not found.');
    }
    

}
