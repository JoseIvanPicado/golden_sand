<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Http\Requests\PaymentsRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
        return view ('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = new Payment();
        return view ('payments.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        Payment::create($request->validated());
        return redirect()->route('payments.index')->with('success', 'Pago realizado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $payments = Payment::find($id);
        return view ('payments.show', compact('payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $payments = Payment::find($id);
        return view ('payments.edit', compact('payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentsRequest $request, int $id)
    {
        $payments = Payment::find($id);
        $payments->update($request->validated());
        return redirect()->route('payments.index')->with('updated', 'Pago actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $payments = Payment::find($id);
        $payments->delete();
        return redirect()->route('payments.index')->with('deleted', 'Pago eliminado con éxito.');
    }
}
