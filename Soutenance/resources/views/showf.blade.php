<x-app-layout>
    @extends('layout')
    @section('content')
    <div class="filiere-info">
        <h3 class="filiere-heading">Informations sur la filière</h3>
        <table class="info-table">
            <tr>
                <td>
                    <p class="info-label"><strong>ID:</strong></p>
                    <p class="info-value">{{$filiere->id}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="info-label"><strong>Filière:</strong></p>
                    <p class="info-value">{{$filiere->filiere}}</p>
                </td>
            </tr>
        </table>
    </div>
    @endsection
</x-app-layout>
