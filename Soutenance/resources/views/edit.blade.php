<x-app-layout>
@extends('layout')
@section('content')
<h3>Modifier Etudiant</h3>
<form method="post" action="{{route('etudiants.update',$etudiant)}}" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nom:</label>
        <input type="text" class="form-control" name="Nom" value="{{$etudiant->Nom}}"/>
    </div>
    <div class="form-group">
        <label for="name">Prenom:</label>
        <input type="text" class="form-control" name="Prenom" value="{{$etudiant->Prenom}}"/>
    </div>

    <div class="form-group">
        <label for="name">Filiere:</label>
        <select class="form-control" name="Filiere">
            @foreach ($filieres as $Filiere)
            <option value="{{$Filiere->id}}">
                {{$Filiere->filiere}}
            </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="name">Groupe:</label>
        <select class="form-control" name="Groupe">
            @foreach ($groupes as $Groupe)
            <option value="{{$Groupe->id}}">
                {{$Groupe->intitule}}
            </option>
            @endforeach
        </select>
    </div>

    
    <div class="form-group">
            <label for="name">Image:</label>
            <input type="file" class="form-control" name="image" />
            @if ($etudiant->image)
                <img src="{{ asset('image/' . $etudiant->image) }}" alt="Image précédente" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>
    <button type="submit"  class="btn btn-info mt-3" >Modifier Etudiant</button>
</form>
@endsection('content')
</x-app-layout>