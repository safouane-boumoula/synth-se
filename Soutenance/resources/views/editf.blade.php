<x-app-layout>
@extends('layout')
@section('content')
<h3>Modifier Filiere</h3>
<form method="post" action="{{route('filieres.update',$filiere)}}" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="filiere">filiere:</label>
        <input type="text" class="form-control" name="filiere" value="{{$filiere->filiere}}"/>
    </div>
    <button type="submit"  class="btn btn-info mt-3" >Modifier Filiere</button>
</form>
@endsection('content')
</x-app-layout>