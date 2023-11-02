<x-app-layout>
@extends('layout')
@section('content')
<h3>Cours liste</h3>
          
<div class="table-wrapper">
    <table class="fl-table" style="border-collapse: collapse; width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Nom course</th>
                <th>Filière</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->Nom }}</td>
                <td>{{ $course->filiere->filiere }}</td>
                
                <td>
                    <a style="margin: 10px;" class="btn btn-primary" href="{{ route('courses.edit', $course->id) }}">Modifier</a>
                </td>
                <td>
                    <a style="margin: 10px;"  class="btn btn-danger" href="{{ route('courses.destroy', $course->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $course->id }}').submit();">Delete</a>
                    <form id="delete-form-{{ $course->id }}" action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
</x-app-layout>
