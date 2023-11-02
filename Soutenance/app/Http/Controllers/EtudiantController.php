<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Models\Etudiant;
use Illuminate\Support\Facades\DB;
use App\Models\Filiere;

class EtudiantController extends Controller
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
    
        return view('index', compact('etudiants'));
    }
    
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filieres=Filiere::all();
        $groupes=Groupe::all();
        return view('create',compact("filieres","groupes"));
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
            'Nom' => 'required|max:255',
            'Prenom' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg',
        ]);
    
        $existingStudent = Etudiant::where('Nom', $validatedData['Nom'])
            ->where('Prenom', $validatedData['Prenom'])
            ->first();
    
        if ($existingStudent) {
            return redirect()->back()->with('error', 'Cet étudiant existe déjà.');
        }


       $image=$request->file('image');
       $destinationPath='image/';
       $profileImage=date('Ymdhis').".".$image->getClientOriginalExtension();
       $image->move($destinationPath,$profileImage);
       $validateData['image']=$profileImage;


       $etudiant=new Etudiant();
       $etudiant->Nom=$request->Nom;
       $etudiant->Prenom=$request->Prenom;
       $etudiant->id_Filiere=$request->Filiere;
       $etudiant->id_Groupe=$request->Groupe;
       $etudiant->image=$profileImage;
       
       $etudiant->save();


    return redirect('/etudiants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $filieres=Filiere::all()->pluck('filiere','id');
        $groupes=Groupe::all()->pluck('intitule','id');
        return view('show',compact('etudiant','groupes','filieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $groupes = Groupe::all();
        $filieres=Filiere::all();
        return view('edit', compact('etudiant','groupes','filieres'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|max:255',
            'Prenom' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg',
            'Filiere' => 'required',
            'Groupe' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'image/';
            $profileImage = date('Ymdhis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $etudiant->image = $profileImage;
        }

        $etudiant->Nom = $validatedData['Nom'];
        $etudiant->Prenom = $validatedData['Prenom'];
        $etudiant->id_Groupe = $validatedData['Groupe'];
        $etudiant->id_Filiere = $validatedData['Filiere'];
        $etudiant->save();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
       $etudiant->delete();

       return redirect()->route('etudiants.index')->with('success','etudiant Deleted successfully');
    }
}