<x-app-layout>
@extends('layout')
@section('content')
<div style="text-align: center; margin-bottom: 20px;">
    <h3 style="font-size: 24px; font-weight: bold; color: #333;">Groupe Informations</h3>
</div>
<table class="info-table" style="margin: 0 auto; width: 80%; border-collapse: collapse;">
    <tr>
        <td style="padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">
            <p style="font-size: 16px; color: #555;"><strong>ID:</strong> {{$groupe->id}}</p>
            <p style="font-size: 16px; color: #555;"><strong>Intitule:</strong> {{$groupe->intitule}}</p>
            <p style="font-size: 16px; color: #555;"><strong>Filiere:</strong> {{$filieres[strval($groupe->id_Filiere)]}}</p>
        </td>
    </tr>
</table>
@endsection
</x-app-layout>