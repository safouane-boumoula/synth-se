<x-app-layout>
@extends('layout')
@section('content')
<style>
    .add-enseignant {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f8f8f8;
    }

    .form-heading {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        text-align: center;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .error-message {
        color: red;
        margin-top: 5px;
    }
</style>

<h3>Ajouter une absence </h3>

<form action="{{ route('absences.store') }}" method="POST">
            @csrf
            <div class="form-group">

            <input type="hidden" name="id_Etudiant" value="{{ $selectedEtudiant->id }}">
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
            <select name="is_present" id="is_present" class="form-control">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

                @error('is_present')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button style="margin:20px;" type="submit" class="btn btn-primary">Ajouter</button>
        </form>

@endsection
</x-app-layout>