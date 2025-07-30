<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Klant bewerken</title>
</head>
<body>
    <h1>Klant bewerken</h1>

    <form method="POST" action="/klanten/{{ $klant->id }}">
        @csrf
        @method('PUT')

        <p>
            <label>Voornaam:
                <input type="text" name="voornaam" value="{{ old('voornaam', $klant->voornaam) }}">
            </label>
        </p>

        <p>
            <label>Achternaam:
                <input type="text" name="achternaam" value="{{ old('achternaam', $klant->achternaam) }}">
            </label>
        </p>

        <p>
            <label>Email:
                <input type="email" name="email" value="{{ old('email', $klant->email) }}">
            </label>
        </p>

        <p>
            <label>Telefoon:
                <input type="text" name="telefoon" value="{{ old('telefoon', $klant->telefoon) }}">
            </label>
        </p>

        <button type="submit">Opslaan</button>
    </form>

    <p><a href="/klanten">← Terug naar lijst</a></p>
</body>
</html>
