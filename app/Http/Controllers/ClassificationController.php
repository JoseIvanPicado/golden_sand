<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;
use App\Http\Requests\ClassificationRequest;
use App\Models\Product;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::with('product')->paginate(5);
        return view('classifications.index', compact ('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classifications = new Classification();
        $products = Product::all();
        return view('classifications.create', compact('classifications','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassificationRequest $request)
    {
        Classification::create($request->validated());
        return redirect()->route('classifications.index')->with('success', 'Clasificación creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $classifications = Classification::find($id);
        $products = Product::all();
        return view('classifications.show', compact('classifications','products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $classifications = Classification::find($id);
        $products = Product::all();
        return view('classifications.edit', compact('classifications','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassificationRequest $request, int $id)
    {
        $classifications = Classification::find($id);
        $classifications->update($request->validated());
        return redirect()->route('classifications.index')->with('updated', 'Clasificación actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $classifications = Classification::find($id);
        $classifications->delete();
        return redirect()->route('classifications.index')->with('deleted', 'Clasificación eliminada.');
    }
}
