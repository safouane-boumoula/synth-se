<x-app-layout>
    @extends('layout')
    @section('content')
        <h3>Notes Etudiant: {{ $note->etudiant->Nom }} {{ $note->etudiant->Prenom }}</h3>
        <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
            <tr>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Course</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 1</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 2</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 3</th>
                <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Moyenne</th>
            </tr>
            @foreach ($courses as $course)
            <tr>
                <td style="border: 1px solid #ddd; padding: 15px;">{{ $course->Nom }}</td>
                @php
                    $noteByCourse = $course->notes->where('id_Etudiant', $note->id_Etudiant)->first();
                @endphp
                @if(isset($noteByCourse))
                    <td style="border: 1px solid #ddd; padding: 15px;">{{ $noteByCourse->note1 }}</td>
                    <td style="border: 1px solid #ddd; padding: 15px;">{{ $noteByCourse->note2 }}</td>
                    <td style="border: 1px solid #ddd; padding: 15px;">{{ $noteByCourse->note3 }}</td>
                    <td style="border: 1px solid #ddd; padding: 15px;">{{ ($noteByCourse->note1 + $noteByCourse->note2 + $noteByCourse->note3) / 3 }}</td>
                @else
                    <td style="border: 1px solid #ddd; padding: 15px;"></td>
                    <td style="border: 1px solid #ddd; padding: 15px;"></td>
                    <td style="border: 1px solid #ddd; padding: 15px;"></td>
                    <td style="border: 1px solid #ddd; padding: 15px;"></td>
                @endif
            </tr>
            @endforeach
        </table>
    @endsection
</x-app-layout>
