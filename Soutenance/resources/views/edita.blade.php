<x-app-layout>
@extends('layout')
@section('content')
<h3>Modifier l'absence</h3>
<form action="{{ route('absences.update', $absence->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
    <div class="form-group">
                <label for="id_Etudiant">Étudiant</label>
                <select name="id_Etudiant" id="id_Etudiant" class="form-control">
                @foreach ($etudiants as $Etudiant)
                <option value="{{$Etudiant->id}}">
                    {{$Etudiant->Nom}}
                </option>
                @endforeach
            </select>
    </div>
    <div>
        <label for="date">Date :</label>
        <input type="date" name="date" id="date" value="{{ $absence->date }}">
    </div>
    <div>
    <div class="form-group">
                <label for="is_present">Présent</label>
                <select name="is_present" id="is_present" class="form-control">
                    <option value="1">Oui</option>
                    <option value="0">Non</option>
                </select>
    </div>
    <button style="margin:20px;" type="submit" class="btn btn-primary">Modifier</button>
</form>
@endsection('content')
</x-app-layout>