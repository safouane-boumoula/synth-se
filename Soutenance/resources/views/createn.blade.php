<x-app-layout>
    @extends('layout')

    @section('content')
        <h3>Ajouter des notes pour l'étudiant</h3>

        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_Etudiant" value="{{ $selectedEtudiant->id }}">
            <input type="hidden" name="id_Groupe" value="{{ $selectedGroupe->id }}">

            


            <label for="id_Course">Course:</label>
            <select name="id_Course" id="id_Course">
                <option value="">Select a course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->Nom }}</option>
                @endforeach
            </select>

            <div id="notes-section" style="display: none;">
                <p id="selected-course"></p>

                <table style="border-collapse: collapse; width: 100%; margin-top: 20px;">
                    <tr>
                        <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 1</th>
                        <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 2</th>
                        <th style="background-color: #f2f2f2; border: 1px solid #ddd; padding: 15px;">Note 3</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 15px;">
                            <input type="number" name="note1" step="0.01" required>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 15px;">
                            <input type="number" name="note2" step="0.01" required>
                        </td>
                        <td style="border: 1px solid #ddd; padding: 15px;">
                            <input type="number" name="note3" step="0.01" required>
                        </td>
                    </tr>
                </table>
            </div>

            <br>

            <button type="submit" id="submit-button" style="display: none;">Enregistrer</button>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectCourse = document.getElementById('id_Course');
                const notesSection = document.getElementById('notes-section');
                const submitButton = document.getElementById('submit-button');
                const selectedCourse = document.getElementById('selected-course');

                selectCourse.addEventListener('change', function() {
                    if (this.value) {
                        const courseName = this.options[this.selectedIndex].text;
                        selectedCourse.innerText = "Selected Course: " + courseName;
                        notesSection.style.display = 'block';
                        submitButton.style.display = 'block';
                    } else {
                        selectedCourse.innerText = "";
                        notesSection.style.display = 'none';
                        submitButton.style.display = 'none';
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>
