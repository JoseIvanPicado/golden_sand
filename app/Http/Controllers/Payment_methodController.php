<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment_method;
use App\Http\Requests\Payment_methodRequest;
use App\Models\Order;
use App\Models\Payment;
class Payment_methodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_methods = Payment_method::with('order','payment')->paginate(5);
        return view('payment_methods.index', compact ('payment_methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment_methods = new Payment_method();
        $orders = Order::all();
        $payments = Payment::all();
        return view('payment_methods.create', compact('payment_methods','orders','payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Payment_methodRequest $request)
    {
        Payment_method::create($request->all());
        return redirect()->route('payment_methods.index')->with('success', 'Método de pago creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $payment_methods = Payment_method::find($id);
        $orders = Order::all();
        $payments = Payment::all();
        return view('payment_methods.show', compact('payment_methods','orders','payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $payment_methods = Payment_method::find($id);
        $orders = Order::all();
        $payments = Payment::all();
        return view('payment_methods.edit', compact('payment_methods','orders','payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Payment_methodRequest $request, int $id)
    {
        $payment_methods = Payment_method::find($id);
        $payment_methods->update($request->validated());
        return redirect()->route('payment_methods.index')->with('updated', 'Método de pago actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $payment_methods = Payment_method::find($id);
        $payment_methods->delete();
        return redirect()->route('payment_methods.index')->with('deleted', 'Método de pago eliminado.');
    }
}
