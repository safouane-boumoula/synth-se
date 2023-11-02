<x-app-layout>
    @extends('layout')
    @section('content')
    <style>
    .add-etudiant {
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

        <div class="add-etudiant">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

            <h3 class="form-heading">Ajouter un étudiant</h3>
            <form method="POST" action="{{ route('etudiants.store') }}" enctype="multipart/form-data" class="etudiant-form">
                @csrf   
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" name="Nom" id="nom" placeholder="Entrez le nom"/>
                    @error('Nom')
                    <div class="error-message">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" class="form-control" name="Prenom" id="prenom" placeholder="Entrez le prénom"/>
                    @error('Prenom')
                    <div class="error-message">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="filiere">Filière:</label>
                    <select class="form-control" name="Filiere" id="filiere">
                        @foreach ($filieres as $Filiere)
                        <option value="{{$Filiere->id}}">{{$Filiere->filiere}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="groupe">Groupe:</label>
                    <select class="form-control" name="Groupe" id="groupe">
                        @foreach ($groupes as $Groupe)
                        <option value="{{$Groupe->id}}">{{$Groupe->intitule}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" name="image" id="image"/>
                    @error('image')
                    <div class="error-message">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-info">Ajouter l'étudiant</button>
            </form>
        </div>
    @endsection
</x-app-layout>
