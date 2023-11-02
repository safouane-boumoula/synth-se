<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Enseignant;
use Illuminate\Support\Facades\DB;
use App\Models\Course;


class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $courseId = $request->query('course_id');

        $query = Enseignant::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('Nom', 'like', '%' . $search . '%')
                    ->orWhere('Prenom', 'like', '%' . $search . '%');
            });
        }

        if ($courseId) {
            $query->where('id_Course', $courseId);
        }

        $enseignants = $query->paginate(4);
        $courses = Course::all();

        return view('indexe', compact('enseignants', 'courses', 'search', 'courseId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses= Course::all();
        return view('createe', [
            'courses'=> $courses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData=$request->validate([
        'Nom'=>'required|max:255',
        'Prenom'=>'required|max:255',
        'Telephone'=>'required|max:255',
        'id_Course'=>'required',
        'image'=>'required|image|mimes:jpg,jpeg,png,svg',
       ]);
       $existingStudent = Enseignant::where('Nom', $validatedData['Nom'])
       ->where('Prenom', $validatedData['Prenom'])
       ->first();

   if ($existingStudent) {
       return redirect()->back()->with('error', 'Cet enseignant existe déjà.');
   }

       $image=$request->file('image');
       $destinationPath='image/';
       $profileImage=date('Ymdhis').".".$image->getClientOriginalExtension();
       $image->move($destinationPath,$profileImage);
       $validateData['image']=$profileImage;


       $enseignant=new Enseignant();
       $enseignant->Nom=$request->Nom;
       $enseignant->Prenom=$request->Prenom;
       $enseignant->Telephone=$request->Telephone;
       $enseignant->id_Course=$request->id_Course;
       $enseignant->image=$profileImage;
       
       $enseignant->save();


    return redirect('/enseignants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        $enseignant->load('course'); 
        return view('showe', compact('enseignant'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        $courses= Course::all();
        return view('edite', compact('enseignant','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
{
    $validatedData = $request->validate([
        'Nom' => 'required|max:255',
        'Prenom' => 'required|max:255',
        'Telephone' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,svg',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $destinationPath = 'image/';
        $profileImage = date('Ymdhis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $validateData['image'] = $profileImage;
    }

    $enseignant->Nom = $request->Nom;
    $enseignant->Prenom = $request->Prenom;
    $enseignant->Telephone = $request->Telephone;
    $enseignant->id_Course = $request->id_Course;

    if (isset($validateData['image'])) {
        $enseignant->image = $validateData['image'];
    }
    
    $enseignant->save();

    return redirect('/enseignants');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $enseignant)
    {
       $enseignant->delete();

       return redirect('/enseignants');
    }
    }