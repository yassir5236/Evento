<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    // Afficher toutes les catégories d'événements
    public function index()
    {
        $categories = EventCategory::all();
        return view('admin.index', compact('categories'));
    }

    // Afficher le formulaire pour créer une nouvelle catégorie d'événement
    public function create()
    {
        return view('admin.add_categories');
    }

    // Enregistrer une nouvelle catégorie d'événement dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:event_categories',
        ]);

        EventCategory::create($request->all());

        return redirect()->route('event-categories.index')->with('success', 'Event category created successfully.');
    }




    // Afficher le formulaire pour mettre à jour une catégorie d'événement
    public function edit(EventCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Mettre à jour la catégorie d'événement dans la base de données
    public function update(Request $request, EventCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:event_categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('event-categories.index')->with('success', 'Event category updated successfully.');
    }

    // Supprimer une catégorie d'événement de la base de données
    public function destroy(EventCategory $category)
    {
        $category->delete();

        return redirect()->route('event-categories.index')->with('success', 'Event category deleted successfully.');
    }
}
