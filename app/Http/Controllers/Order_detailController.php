<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_detail;
use App\Http\Requests\Order_detailRequest;
use App\Models\Payment;
use App\Models\Order;
class Order_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_details = Order_detail::with('order','payment')->paginate(5);
        return view('order_details.index', compact ('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order_details = new Order_detail();
        $payments = Payment::all();
        $orders = Order::all();
        return view('order_details.create', compact('order_details','payments','orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Order_detailRequest $request)
    {
        Order_detail::create($request->validated());
        return redirect()->route('order_details.index')->with('success', 'Detalle del pedido creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $order_details = Order_detail::find($id);
        $payments = Payment::all();
        $orders = Order::all();
        return view('order_details.show', compact('order_details','payments','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $order_details = Order_detail::find($id);
        $payments = Payment::all();
        $orders = Order::all();
        return view('order_details.edit', compact('order_details','payments','orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Order_detailRequest $request, int $id)
    {
        $order_details = Order_detail::find($id);
        $order_details->update($request->validated());
        return redirect()->route('order_details.index')->with('updated', 'Detalle del pedido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $orders_details = Order_detail::find($id);
        $orders_details->delete();
        return redirect()->route('order_details.index')->with('deleted', 'Detalle del pedido eliminado.');
    }
}
