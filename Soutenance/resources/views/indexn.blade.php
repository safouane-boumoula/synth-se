<x-app-layout>
    @extends('layout')
    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-center text-2xl font-bold mt-4">Étudiants Note</h3>
                    
                <div class="col-md-6">
                    <form action="{{ route('notes.index') }}" method="GET" class="form-inline">
                        <div class="input-group">
                            <select name="group" id="group" class="form-control" onchange="this.form.submit()">
                                <option value="">Sélectionner un groupe</option>
                                @foreach ($groupes as $groupe)
                                    <option value="{{ $groupe->id }}" {{ $selectedGroup == $groupe->id ? 'selected' : '' }}>
                                        {{ $groupe->intitule }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

                @if ($selectedGroup)
                    <div class="col-md-12 mt-4">
                        <h4>Étudiants du groupe {{ $selectedGroup }}</h4>
                        @if ($etudiants->isEmpty())
                            <p>Aucun étudiant trouvé pour ce groupe.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Actions</th>
                                        <th></th> <!-- Add an empty header for the delete button column -->
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($etudiants as $etudiant)
                                    @if ($etudiant)
                                        <tr>
                                            <td>{{ $etudiant->Nom }}</td>
                                            <td>{{ $etudiant->Prenom }}</td>    
                                            <td>
                                                <a href="{{ route('notes.create', ['id_Etudiant' => $etudiant->id]) }}" style="margin:10px;" class="btn btn-sm btn-primary">Ajouter note</a>
                                                @if($etudiant->notes->isNotEmpty())
                                                    <a href="{{ route('notes.show', ['note' => $etudiant->notes->first()->id]) }}" class="text-blue-500 hover:underline">Voir</a>
                                                @endif     
                                                @if($etudiant->notes->isNotEmpty())
                                                    <a href="{{ route('notes.edit', ['note' => $etudiant->notes->first()->id]) }}" class="text-green-500 hover:underline">Modifier</a>
                                                @endif
                                            </td>
                                            <td>
                                            @if ($etudiant->notes->isNotEmpty())
                                                <form action="{{ route('notes.destroy', ['note' => $etudiant->notes->first()->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="margin: 10px;" type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
