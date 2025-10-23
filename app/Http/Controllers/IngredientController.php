<?php

namespace App\Http\Controllers;
use App\Models\Ingredient;
use App\Http\Requests\IngredientRequest;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients = Ingredient::latest()->paginate(5);
        return view ('ingredients.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients= new Ingredient();
        return view('ingredients.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IngredientRequest $request)
    {
        Ingredient::create($request->validated());
        return redirect()->route('ingredients.index')->with('success', 'Ingrediente guardado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $ingredients = Ingredient::find($id);
        return view ('ingredients.show', compact('ingredients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $ingredients = Ingredient::find($id);
        return view ('ingredients.edit', compact('ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ingredients = Ingredient::find($id);
        $ingredients->update($request->validated());
        return redirect()->route('ingredients.index')->with('updated', 'Ingrediente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $ingredients = Ingredient::find($id);
        $ingredients->delete();
        return redirect()->route('ingredients.index')->with('deleted', 'Ingrediente eliminado con éxito.');
    }
}
