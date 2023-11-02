<x-app-layout>
@extends('layout')
@section('content')
<h3 style="margin-bottom: 20px;">Groupes liste</h3>

<div class="table-wrapper">
    <table class="fl-table" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>id</th>
                <th>intitule</th>
                <th>Voire info</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groupes as $groupe)
            <tr>
                <td>{{$groupe->id}}</td>
                <td>{{$groupe->intitule}}</td>
                <td>
                    <form method="post" action="{{route('groupes.destroy',$groupe->id)}}">
                        @csrf
                        @method('DELETE')
                        <a style="margin:10px;" class="btn btn-secondary" href="{{route('groupes.show',$groupe->id)}}">See</a>
                </td>
                <td>
                    <a style="margin:10px;" class="btn btn-primary" href="{{route('groupes.edit',$groupe->id)}}">Modifier</a>
                </td>
                <td>
                    <input style="margin:10px;" type="submit" class="btn btn-danger" value="Delete"/> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div style="text-align: center; margin-top: 20px;">
    {{ $groupes->links() }}
</div>
@endsection
</x-app-layout>
