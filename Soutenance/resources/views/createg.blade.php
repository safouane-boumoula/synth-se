<x-app-layout>
@extends('layout')
@section('content')
<h3>Add Groupe</h3>
<form method="POST" action="{{route('groupes.store')}}" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label for="intitule">intitule:</label>
        <input type="text" class="form-control" name="intitule"/>
        @error('intitule')
    <div class="alert alert-danger">{{$message}}</div>
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
    </div>
    <button type="submit" class="btn btn-info mt-3">Add Groupe</button>
</form>
@endsection
</x-app-layout>
