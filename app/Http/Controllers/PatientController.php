<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'house' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id', // Validate that the user_id exists in the users table
        ]);

        // Create the patient and associate it with the user
        $patient = new Patient([
            'patient_name' => $request->name,
            'house' => $request->house,
        ]);

        $user = User::findOrFail($request->user_id);
        $user->patients()->save($patient);

        return redirect()->route('home')
            ->with('success', 'Patient added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
