<x-app-layout>
@extends('layout')
@section('content')
<h3>Modifier Groupe</h3>
<form method="post" action="{{route('groupes.update',$groupe)}}" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="intitule">intitule:</label>
        <input type="text" class="form-control" name="intitule" value="{{$groupe->intitule}}"/>
    </div>

    <div class="form-group">
        <label for="id_Filiere">Filiere:</label>
        <input type="text" class="form-control" name="id_Filiere" value="{{$groupe->id_Filiere}}"/>
    </div>
    <button type="submit"  class="btn btn-info mt-3" >Modifier Groupe</button>
</form>
@endsection('content')
</x-app-layout>