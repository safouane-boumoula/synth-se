<x-app-layout>
    @extends('layout')
    @section('content')
    <div class="container">
        <h3>Liste des enseignants</h3>
        <div class="row mb-3">
    <div class="col-md-6">
        <form action="{{ route('enseignants.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Nom ou Prénom" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </div>
        </form>
    </div>
</div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enseignants as $enseignant)
                    <tr>
                        <td>{{ $enseignant->Nom }}</td>
                        <td>{{ $enseignant->Prenom }}</td>
                        <td>
                            <img src="/image/{{ $enseignant->image }}" width="90" height="90" alt="Image enseignant">
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('enseignants.show', $enseignant->id) }}" style='margin:20px;' class="btn btn-info">See</a>
                                <a href="{{ route('enseignants.edit', $enseignant->id) }}" style='margin:20px;' class="btn btn-primary">Modifier</a>
                                <form action="{{ route('enseignants.destroy', $enseignant->id) }}" style='margin:20px;' method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $enseignants->links() }}
        </div>
    </div>
    @endsection
</x-app-layout>
