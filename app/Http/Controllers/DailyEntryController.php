<?php

namespace App\Http\Controllers;

use App\Models\DailyEntry;
use Illuminate\Http\Request;
use App\Models\Patient;
use Auth;

class DailyEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $patients = Patient::all();
        return view('addDailyEntry', compact('patients'));
    }

    public function allEntries(){

        $users = User::with('patients.dailyEntries')->get();
        return view('allEntries', compact('users'));
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
        $request->validate([
            'date' => 'required|date',
            'patient_id' => 'required|exists:patients,id', // Validate that the patient_id exists in the patients table
        ]);

        // Create the daily entry and associate it with the user and patient
        $dailyEntry = new DailyEntry([
            'date' => $request->date,
            'patient_id' => $request->patient_id,
        ]);

        $user = Auth::user();
        $user->dailyEntries()->save($dailyEntry);

        return redirect()->route('home')
            ->with('success', 'Daily Entry added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(DailyEntry $dailyEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyEntry $dailyEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DailyEntry $dailyEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyEntry $dailyEntry)
    {
        //
    }
}
