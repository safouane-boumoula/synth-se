<x-app-layout>
    @extends('layout')
    @section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Informations sur l'Étudiant</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <td><strong>ID:</strong></td>
                                <td>{{$etudiant->id}}</td>
                            </tr>
                            <tr>
                                <td><strong>Nom:</strong></td>
                                <td>{{$etudiant->Nom}}</td>
                            </tr>
                            <tr>
                                <td><strong>Prénom:</strong></td>
                                <td>{{$etudiant->Prenom}}</td>
                            </tr>
                            <tr>
                                <td><strong>Groupe:</strong></td>
                                <td>{{$groupes[strval($etudiant->id_Groupe)]}}</td>
                            </tr>
                            <tr>
                                <td><strong>Filière:</strong></td>
                                <td>{{$filieres[strval($etudiant->id_Filiere)]}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <img src="/image/{{$etudiant->image}}" width="200" height="200" alt="Photo de l'étudiant">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
