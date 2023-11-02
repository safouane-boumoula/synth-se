<x-app-layout>
    @extends('layout')
    @section('content')
        <h3>Modifier Note de: {{ $note->etudiant->Nom }} {{ $note->etudiant->Prenom }}</h3>

        <form action="{{ route('notes.update', $note) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id_Etudiant" value="{{ $note->etudiant->id }}">

            <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                <tr>
                    <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Course</th>
                    <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 1</th>
                    <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 2</th>
                    <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 3</th>
                </tr>
                @foreach ($courses as $course)
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 15px;">
                            {{ $course->Nom }}
                            <input type="hidden" name="notes[{{ $course->id }}][id_Course]" value="{{ $course->id }}">
                        </td>
                        <td style="border: 1px solid #ddd; padding: 15px;">
                            <input type="number" name="notes[{{ $course->id }}][note1]" step="0.01" value="{{ old('notes.' . $course->id . '.note1', $note->getNoteByCourseAndEtudiant($course->id, $note->etudiant->id)['note1'] ?? '') }}" required>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 15px;">
                            <input type="number" name="notes[{{ $course->id }}][note2]" step="0.01" value="{{ old('notes.' . $course->id . '.note2', $note->getNoteByCourseAndEtudiant($course->id, $note->etudiant->id)['note2'] ?? '') }}" required>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 15px;">
                            <input type="number" name="notes[{{ $course->id }}][note3]" step="0.01" value="{{ old('notes.' . $course->id . '.note3', $note->getNoteByCourseAndEtudiant($course->id, $note->etudiant->id)['note3'] ?? '') }}" required>
                        </td>
                    </tr>
                @endforeach
            </table>

            <br>

            <button type="submit" style="margin: 10px;" class="btn btn-primary">Modifier</button>
        </form>
    @endsection
</x-app-layout>
