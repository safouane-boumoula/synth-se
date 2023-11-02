<x-app-layout>
@extends('layout')
@section('content')
<h3 class="table-heading">Liste des filières</h3>
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Filière</th>
                <th>Voir les informations</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filieres as $filiere)
            <tr>
                <td>{{$filiere->id}}</td>
                <td>{{$filiere->filiere}}</td>
                <td>
                    <form method="post" action="{{route('filieres.destroy', $filiere->id)}}">
                        @csrf
                        @method('DELETE')
                        <a style="margin: 10px;" class="btn btn-secondary" href="{{route('filieres.show', $filiere->id)}}">See</a>
                </td>
                <td>
                    <a style="margin: 10px;" class="btn btn-primary" href="{{route('filieres.edit', $filiere->id)}}">Modifier</a>
                </td>
                <td>
                    <input style="margin: 10px;" type="submit" class="btn btn-danger" value="Supprimer"/> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination-wrapper">
    {{ $filieres->links() }}
</div>
@endsection
</x-app-layout>