<?php

namespace App\Http\Controllers;
use App\Models\Preparation_order;
use App\Http\Requests\Preparation_ordertRequest;
use App\Models\Product;
use App\Models\Employee;
use Illuminate\Http\Request;

class Preparation_orderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preparition_orders = Preparation_order::with('product','employee')->paginate(5);
        return view('preparation_orders.index', compact ('preparition_orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $preparation_orders = new Preparation_order();
        $products = Product::all();
        $employees = Employee::all();
        return view('preparation_orders.create', compact('preparation_orders','products','employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Preparation_orderRequest $request)
    {
        Preparation_order::create($request->validated());
        return redirect()->route('preparation_orders.index')->with('success', 'Orden de preparación creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $preparation_orders = Preparation_order::find($id);
        $products = Product::all();
        $employees = Employee::all();
        return view('preparation_orders.show', compact('preparation_orders','products','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $preparation_orders = Preparation_order::find($id);
        $products = Product::all();
        $employees = Employee::all();
        return view('preparation_orders.edit', compact('preparation_orders','products','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Preparation_orderRequest $request, int $id)
    {
        $preparation_orders = Preparation_order::find($id);
        $preparation_orders->update($request->validated());
        return redirect()->route('preparation_orders.index')->with('updated', 'Orden de preparación actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $preparation_orders = Preparation_order::find($id);
        $preparation_orders->delete();
        return redirect()->route('preparation_orders.index')->with('deleted', 'Orden de preparación eliminada.');
    }
}
