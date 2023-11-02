<x-app-layout>
@extends('layout')
@section('content')
<h3>Modifier Enseignant</h3>
<form method="post" action="{{route('enseignants.update',$enseignant)}}" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nom:</label>
        <input type="text" class="form-control" name="Nom" value="{{$enseignant->Nom}}"/>
    </div>

    <div class="form-group">
        <label for="name">Prenom:</label>
        <input type="text" class="form-control" name="Prenom" value="{{$enseignant->Prenom}}"/>
    </div>
    
    <div class="form-group">
        <label for="Telephone">Telephone:</label>
        <input type="text" class="form-control" name="Telephone" value="{{$enseignant->Telephone}}"/>
    </div>

    <div class="form-group">
            <label for="id_Course">Course :</label>
            <select name="id_Course" id="id_Course" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->Nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Image:</label>
            <input type="file" class="form-control" name="image" />
            @if ($enseignant->image)
                <img src="{{ asset('image/' . $enseignant->image) }}" alt="Image précédente" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>
    <button type="submit"  class="btn btn-info mt-3" >Modifier Enseignant</button>
</form>
@endsection('content')
</x-app-layout>