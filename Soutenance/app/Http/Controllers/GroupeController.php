<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Models\Groupe;
use Illuminate\Support\Facades\DB;


class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =DB::table('groupes')->paginate(4);
        return view('indexg',['groupes'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filieres=Filiere::all();
        return view('createg',compact("filieres"));
       }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'intitule' => 'required|max:255',
            
        ]);
       
        $groupe=new Groupe();
        $groupe->Intitule=$validateData['intitule'];
        $groupe->id_Filiere=$request->Filiere;
        $groupe->save();

        return redirect('/groupes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Groupe $groupe)
    {
        $filieres=filiere::all()->pluck('filiere','id');
        return view('showg',compact('groupe','filieres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Groupe $groupe)
    {
        $filieres=Filiere::all();
        return view('editg', compact('groupe','filieres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Groupe $groupe)
    {
       
           $groupe->intitule=$request->intitule;
           $groupe->id_Filiere=$request->id_Filiere;           
           $groupe->save();

           return redirect('/groupes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Groupe $groupe)
    {
      $groupe->delete();

       return redirect()->back();
    }
}
