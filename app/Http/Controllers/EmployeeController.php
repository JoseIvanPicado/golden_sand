<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view ('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees= new Employee();
        return view('employees.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with('success', 'Empleado creado con éxito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employees = Employee::find($id);
        return view ('employees.show', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $employees = Employee::find($id);
        return view ('employees.edit', compact('employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, int $id)
    {
        $employees = Employee::find($id);
        $employees->update($request->validated());
        return redirect()->route('employees.index')->with('updated', 'Empleado actualizado.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $employees = Employee::find($id);
        $employees->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado.');
    }
}
