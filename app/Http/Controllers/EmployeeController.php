<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json(Employee::all());
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'salary_type' => 'required|string|max:50',
            'salary' => 'required|numeric'
        ]);

        $employee = Employee::create($validated);
        return response()->json([
            'message' => 'Employee created successfully',
            'employee' => $employee
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'occupation' => 'sometimes|required|string|max:255',
            'salary_type' => 'sometimes|required|string|max:50',
            'salary' => 'sometimes|required|numeric'
        ]);

        $employee->update($validated);

        return response()->json([
            'message' => 'Employee updated successfully',
            'employee' => $employee
        ]);
    }
}
