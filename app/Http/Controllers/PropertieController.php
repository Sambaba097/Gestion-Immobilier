<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propertie;
use Illuminate\Support\Facades\Storage; // Pour la gestion des fichiers

class PropertieController extends Controller
{
    public function home(){
        $property = Propertie::all();
        return view('property.home', compact('property'));
    }
    public function create(){
        // Afficher le formulaire de création d'un bien
        return view('property.create');
    }
    public function admin(){
        // Afficher la page de gestion de tous les biens
        $property = Propertie::all();
        return view('property.admin', compact('property'));
    }
    public function index()
    {
        // Liste tous les biens
        $property = Propertie::all();
        return view('property.list', compact('property'));
    }

    public function show($id)
    {
        // Affiche un bien spécifique
        $property = Propertie::findOrFail($id); // Trouve le bien ou renvoie une erreur 404
        return view('property.show', compact('property'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Limite à 2 MB
            'description' => ['required', 'string'],
            'adresse' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:libre,occupé'],
        ]);

         // Gérer l'upload de l'image
         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Créer un nouveau bien
        $property = Propertie::create([
            'nom' => $request->nom,
            'category' => $request->category,
            'image' => $imagePath?? null,
            'description' => $request->description,
            'adresse' => $request->adresse,
           'status' => $request->status,

        ]);
        
        if($property){
            return redirect()->route('propertie.home')->with('success', 'Bien ajouté avec succès');
        }else
            return redirect()->route('propertie.home')->with('error', 'Erreur lors de l\'ajout du bien');
    }

    public function edit($id)
    {
        // Met à jour un bien
        $property = Propertie::findOrFail($id);
        return view('property.edit', compact('property'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image est optionnel
            'description' => ['required', 'string'],
            'adresse' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:libre,occupé'],
        ]);

        // Récupérer le bien à modifier
        $property = Propertie::findOrFail($id);

        // Gérer l'upload de l'image si une nouvelle image est uploadé
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image du stockage
            if ($property->image) {
                Storage::delete('public/' . $property->image);
            }
            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            
        }else{
            // Conserver l'ancienne image si aucune nouvelle n'est uploadée
            $imagePath = $property->image;
        }

        // Mettre à jour les informations du bien
        $property->update([
            'nom' => $request->nom,
            'category' => $request->category,
            'image' => $imagePath?? null,
            'description' => $request->description,
            'adresse' => $request->adresse,
            'status' => $request->status,
        ]);

        return redirect()->route('propertie.admin')->with('success', 'Bien modifié avec succès');
    }   


    public function destroy($id)
    {
        // Supprime un bien
        Propertie::destroy($id);
            return redirect()->route('propertie.admin')->with('success', 'Bien supprimé avec succès');
    }
}
