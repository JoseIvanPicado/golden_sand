<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Requests\InventoryRequest;
use App\Models\Product;
use App\Models\Employee;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::with('product','employee')->paginate(5);
        return view('inventories.index', compact ('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventories = new Inventory();
        $products = Product::all();
        $employees = Employee::all();
        return view('inventories.create', compact('inventories','products','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InventoryRequest $request)
    {
        Inventory::create($request->validated());
        return redirect()->route('inventories.index')->with('success', 'Inventario creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $inventories = Inventory::find($id);
        $products = Product::all();
        $employees = Employee::all();
        return view('inventories.show', compact('inventories','products','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $inventories = Inventory::find($id);
        $products = Product::all();
        $employees = Employee::all();
        return view('inventories.edit', compact('inventories','products','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InventoryRequest $request, int $id)
    {
        $inventories = Inventory::find($id);
        $inventories->update($request->validated());
        return redirect()->route('inventories.index')->with('updated', 'Inventario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $inventories = Inventory::find($id);
        $inventories->delete();
        return redirect()->route('inventories.index')->with('deleted', 'Inventario eliminado.');
    }
}
