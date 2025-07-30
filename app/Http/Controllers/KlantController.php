<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Klant;

class KlantController extends Controller
{
    public function index()
    {
        $klanten = Klant::all(); // Haalt alle klanten uit de database
        return view('klanten.index', compact('klanten')); // Stuurt ze door naar de view
    }

    public function create()
    {
        return view('klanten.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'voornaam' => 'required|string|max:100',
            'achternaam' => 'required|string|max:100',
            'email' => 'required|email|unique:klanten,email',
            'telefoon' => 'nullable|string|max:50',
        ]);

        Klant::create($validated);

        return redirect('/klanten')->with('success', 'Klant toegevoegd!');
    }

    public function edit($id)
    {
        $klant = Klant::findOrFail($id);
        return view('klanten.edit', compact('klant'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'voornaam' => 'required|string|max:100',
            'achternaam' => 'required|string|max:100',
            'email' => 'required|email|unique:klanten,email,' . $id,
            'telefoon' => 'nullable|string|max:50',
        ]);

        $klant = Klant::findOrFail($id);
        $klant->update($validated);

        return redirect('/klanten')->with('success', 'Klant bijgewerkt!');
    }

    public function destroy($id)
    {
        $klant = Klant::findOrFail($id);
        $klant->delete();

        return redirect('/klanten')->with('success', 'Klant verwijderd!');
    }
}
