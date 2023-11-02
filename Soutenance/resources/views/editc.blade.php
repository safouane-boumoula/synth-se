<x-app-layout>
@extends('layout')
@section('content')
<h3 style="margin-bottom: 20px;">Modifier Cours "{{ $course->Nom }}"</h3>

<form action="{{ route('courses.update', $course->id) }}" method="POST" style="max-width: 500px; margin: 0 auto;">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="Nom">Nom du cours:</label>
        <input type="text" id="Nom" name="Nom" value="{{ $course->Nom }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="Filiere">Filiere:</label>
        <select class="form-control" name="Filiere">
            @foreach ($filieres as $Filiere)
            <option value="{{$Filiere->id}}">
                {{$Filiere->filiere}}
            </option>
            @endforeach
        </select>
    </div>

    <button style="margin: 30px;" type="submit" class="btn btn-primary">Modifier</button>
</form>
@endsection
</x-app-layout>
