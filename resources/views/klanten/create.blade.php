<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Klant</title>
</head>
<body>
    <h1>Nieuwe Klant toevoegen</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $fout)
                    <li>{{ $fout }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/klanten">
        @csrf

        <p>
            <label>Voornaam: <input type="text" name="voornaam" value="{{ old('voornaam') }}"></label>
        </p>

        <p>
            <label>Achternaam: <input type="text" name="achternaam" value="{{ old('achternaam') }}"></label>
        </p>

        <p>
            <label>Email: <input type="email" name="email" value="{{ old('email') }}"></label>
        </p>

        <p>
            <label>Telefoon: <input type="text" name="telefoon" value="{{ old('telefoon') }}"></label>
        </p>

        <button type="submit">Opslaan</button>
    </form>

    <p><a href="/klanten">← Terug naar klantenlijst</a></p>
</body>
</html>
