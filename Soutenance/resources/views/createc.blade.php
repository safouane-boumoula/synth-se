<x-app-layout>
@extends('layout')
@section('content')
<h3>Add Cours</h3>

<form action="{{ route('courses.store') }}" method="POST">
    @csrf

    <div class="form-group">
    <label for="Nom">Nom du cours :</label>
    <input type="text" id="Nom" name="Nom"><br>
    @error('Nom')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
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
        <!-- @error('id_Filiere')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror -->
    </div>

    <button style="margin: 20px;" type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection
</x-app-layout>