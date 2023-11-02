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

        <div class="add-enseignant">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
            <h3 class="form-heading">Add Enseignant</h3>
            <form method="POST" action="{{ route('enseignants.store') }}" enctype="multipart/form-data" class="enseignant-form">
                @csrf
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" name="Nom" placeholder="Entrez le nom"/>
                    @error('Nom')
                    <div class="error-message">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Prenom:</label>
                    <input type="text" class="form-control" name="Prenom" placeholder="Entrez le prénom"/>
                    @error('Prenom')
                    <div class="error-message">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Telephone">Telephone:</label>
                    <input type="text" class="form-control" name="Telephone" placeholder="Entrez le numéro de téléphone"/>
                    @error('Telephone')
                    <div class="error-message">{{$message}}</div>
                    @enderror
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
                    @error('id_Course')
                    <div class="error-message">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Image:</label>
                    <input type="file" class="form-control" name="image"/>
                    @error('image')
                    <div class="error-message">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info mt-3">Add Enseignant</button>
            </form>
        </div>
    @endsection
</x-app-layout>
