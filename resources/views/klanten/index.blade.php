@extends('layouts.app')

@section('title', 'Klantenlijst')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Klanten</h1>
    <a href="/klanten/nieuw" class="btn btn-success">➕ Nieuwe klant</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Telefoon</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($klanten as $klant)
        <tr>
            <td>{{ $klant->id }}</td>
            <td>{{ $klant->voornaam }}</td>
            <td>{{ $klant->achternaam }}</td>
            <td>{{ $klant->email }}</td>
            <td>{{ $klant->telefoon }}</td>
            <td>
                <a href="/klanten/{{ $klant->id }}/bewerk" class="btn btn-sm btn-primary">✏️</a>

                <form action="/klanten/{{ $klant->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Zeker weten?')">🗑️</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection