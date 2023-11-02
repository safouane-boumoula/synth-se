<x-app-layout>
    @extends('layout')
    @section('content')
        <h3>Étudiants Liste</h3>

        <div class="row mb-3">
            <div class="col-md-6">
                <form action="{{ route('absences.index') }}" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Nom ou Prénom" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-wrapper">
            <table class="fl-table" style="border-radius: 5px; font-size: 12px; font-weight: normal; border: none; border-collapse: collapse; width: 120%; text-align:center; margin-left: -10%; white-space: nowrap; background-color: white;">
                <thead>
                    <tr>
                        <th>Étudiant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->Nom }} {{ $etudiant->Prenom }}</td>
                            <td>
                                <a href="{{ route('absences.create', ['id_Etudiant' => $etudiant->id]) }}" style="margin:10px;" class="btn btn-sm btn-primary">Ajouter absence</a>
                                @if ($etudiant->absences->count() > 0)
                                    <a href="{{ route('absences.show', $etudiant->absences->first()->id) }}" class="btn btn-sm btn-secondary">Voir</a>
                                    <form action="{{ route('absences.destroy', $etudiant->absences->first()->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette absence ?')">Supprimer</button>
                                    </form>
                                @else
                                    <span class="btn btn-sm btn-secondary disabled">Voir</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</x-app-layout>
