<x-app-layout>
    @extends('layout')
    @section('content')
    <div class="container">
        <div class="card" style="border: 1px solid #ccc; border-radius: 5px; padding: 10px;">
            <div class="card-header" style="background-color: #f0f0f0; padding: 10px;">
                <h3 class="card-title" style="color: #333; margin: 0;">Informations sur l'enseignant</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-item" style="margin-bottom: 10px;">
                            <span class="info-label" style="font-weight: bold;">ID:</span>
                            <span class="info-value">{{ $enseignant->id }}</span>
                        </div>
                        <div class="info-item" style="margin-bottom: 10px;">
                            <span class="info-label" style="font-weight: bold;">Nom:</span>
                            <span class="info-value">{{ $enseignant->Nom }}</span>
                        </div>
                        <div class="info-item" style="margin-bottom: 10px;">
                            <span class="info-label" style="font-weight: bold;">Prénom:</span>
                            <span class="info-value">{{ $enseignant->Prenom }}</span>
                        </div>
                        <div class="info-item" style="margin-bottom: 10px;">
                            <span class="info-label" style="font-weight: bold;">Téléphone:</span>
                            <span class="info-value">{{ $enseignant->Telephone }}</span>
                        </div>
                        <div class="info-item" style="margin-bottom: 10px;">
                            <span class="info-label" style="font-weight: bold;">Cours:</span>
                            <span class="info-value">{{ $enseignant->course->Nom }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-image">
                            <img src="/image/{{ $enseignant->image }}" alt="Photo de l'enseignant" style="width: 100%; border-radius: 50%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
