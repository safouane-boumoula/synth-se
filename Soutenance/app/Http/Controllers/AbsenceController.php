<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
use App\Models\Etudiant;



class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
    
        $query = Etudiant::query();
    
        if ($search) {
            $query->where('Nom', 'like', '%' . $search . '%')
                ->orWhere('Prenom', 'like', '%' . $search . '%');
        }
    
        $etudiants = $query->paginate(4);

        return view('indexa', compact( 'etudiants'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_Etudiant)
{
    $etudiant = Etudiant::findOrFail($id_Etudiant);
    $selectedEtudiant = $etudiant;
    return view('createa', compact('selectedEtudiant'));
}

    
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'id_Etudiant' => 'required',
        'date' => 'required|date',
        'is_present' => 'required|boolean',
    ]);

    $absence = new Absence();       
    $absence->id_Etudiant = $request->id_Etudiant;
    $absence->date = $request->date;
    $absence->is_present = $request->is_present;

    $absence->save();

    return redirect('/absences');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
{
    $absence = Absence::findOrFail($id);
    $etudiant = Etudiant::findOrFail($absence->id_Etudiant);
    $etudiantAbsences = $etudiant->absences;
    return view('showa', compact('absence', 'etudiantAbsences'));
}
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Absence $absence)
    {
        $etudiants = Etudiant::all();
        return view('edita', compact('absence', 'etudiants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absence $absence)
    {
        $validatedData = $request->validate([
            'id_Etudiant' => 'required',
            'date' => 'required|date',
            'is_present' => 'required|boolean',
        ]);

        $absence->id_Etudiant=$request->id_Etudiant;
        $absence->date=$request->date;
        $absence->is_present=$request->is_present;
 
        $absence->save();

        return redirect('/absences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();

        return back();
    }
    public function destroyMultiple(Request $request)
{
    $absences = $request->input('absences');
    Absence::whereIn('id', $absences)->delete();

    return redirect()->route('absences.index');
}
}