<x-app-layout>
@extends('layout')
@section('content')
<h3>Add Filiere</h3>
<form method="POST" action="{{route('filieres.store')}}" enctype="multipart/form-data">

    @csrf
    <div class="form-group">
        <label for="filiere">filiere:</label>
        <input type="text" class="form-control" name="filiere"/>
    @error('filiere')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    </div>
    
    <button type="submit" class="btn btn-info mt-3">Add Filiere</button>
</form>
@endsection
</x-app-layout>
