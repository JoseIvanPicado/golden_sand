<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Http\Requests\DeliveryRequest;
use App\Models\Employee;
use App\Models\Client;
class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::with('employee', 'client')->paginate(5);
        return view('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deliveries = new Delivery();
        $employees = Employee::all();
        $clients = Client::all();
        return view('deliveries.create', compact('deliveries', 'employees', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        Delivery::create($request->validated());
        return redirect()->route('deliveries.index')->with('success', ' La entrega  se ha registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $deliveries = Delivery::find($id);
        $employees = Employee::all();
        $clients = Client::all();
        return view('deliveries.show', compact('deliveries', 'employees', 'clients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $deliveries = Delivery::find($id);
        $employees = Employee::all();
        $clients = Client::all();
        return view('deliveries.edit', compact('deliveries', 'employees', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, int $id)
    {
        $deliveries = Delivery::find($id);
        $deliveries->update($request->validated());
        return redirect()->route('deliveries.index')->with('updated', ' La entrega se ha actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $deliveries = Delivery::find($id);
        $deliveries->delete();
        return redirect()->route('deliveries.index')->with('deleted', ' La entrega se ha eliminado exitosamente.');
    }
}
