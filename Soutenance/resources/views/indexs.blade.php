<!-- <x-app-layout>
    @extends('layout')
    @section('content')
    <div class="container">
        <h3 class="my-4">Liste des Étudiants</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Image</th>
                        <th>Voir Détails</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->Nom }}</td>
                        <td>{{ $etudiant->Prenom }}</td>
                        <td>
                            @if($etudiant->image)
                            <img src="/image/{{ $etudiant->image }}" width="90" height="90" class="rounded-circle" />
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('etudiants.show', $etudiant->id) }}" style='margin:30px;' class="btn btn-primary btn-sm">See</a>
                        </td>
                        <td>
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" style='margin:30px;' class="btn btn-warning btn-sm">Modifier</a>
                        </td>
                        <td>
                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" style='margin:30px;' method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center mt-4">
            {{ $etudiants->links() }}
        </div>
    </div>
    @endsection
</x-app-layout> -->