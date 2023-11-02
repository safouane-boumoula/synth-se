<x-app-layout>
    @extends('layout')
    @section('content')

        <div class="table-wrapper">
            <h4>Absences de l'étudiant: {{ $absence->etudiant->Nom }} {{ $absence->etudiant->Prenom }}</h4>
            @if ($etudiantAbsences->count() > 0)
                <form action="{{ route('absences.destroyMultiple') }}" method="POST">
                    @csrf
                    <table class="fl-table"
                        style="border-radius: 5px; font-size: 12px; font-weight: normal; border: none; border-collapse: collapse; width: 120%; text-align:center; margin-left: -10%; white-space: nowrap; background-color: white;">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Présent</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etudiantAbsences as $absence)
                                <tr>
                                    <td>{{ $absence->date }}</td>
                                    <td>{{ $absence->is_present ? 'Oui' : 'Non' }}</td>
                                    <td>
                                        <input type="checkbox" name="absences[]" value="{{ $absence->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Êtes-vous sûr de vouloir supprimer les absences sélectionnées ?')">Supprimer</button>
                </form>
            @else
                <p>Aucune absence enregistrée pour cet étudiant.</p>
            @endif
        </div>
    @endsection
</x-app-layout>
