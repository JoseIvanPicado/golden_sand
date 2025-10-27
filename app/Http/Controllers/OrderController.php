<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Client;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('client')->paginate(5);
        return view('orders.index', compact ('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = new Order();
        $clients = Client::all();
        return view('orders.create', compact('orders','clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        Order::create($request->validated());
        return redirect()->route('orders.index')->with('success', 'Pedido creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $orders = Order::find($id);
        $clients = Client::all();
        return view('orders', compact('orders','clients'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $orders = Order::find($id);
        $clients = Client::all();
        return view('orders.edit', compact('orders','clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, int $id)
    {
        $orders = Order::find($id);
        $orders->update($request->validated());
        return redirect()->route('orders.index')->with('updated', 'Pedido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->route('orders.index')->with('deleted', 'Pedido eliminado.');
    }
}
