<?php

namespace App\Http\Controllers;

use App\Models\DailyEntry;
use Illuminate\Http\Request;
use App\Models\Patient;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DailyEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $houseId = Auth::user()->house;
    // Get patients belonging to the same house as the authenticated user using a raw SQL query
        $patients = DB::select('SELECT * FROM patients WHERE house = ?', [$houseId]);
    // You can convert the results to a collection if needed
        $patients = collect($patients);
        return view('addDailyEntry', compact('patients'));
    }


    public function allEntries(){
    // Get the daily entries related to the user's house

    // Get the daily entries related to the user's house
    $userId = Auth::id();
    $entries = DailyEntry::leftJoin('patients', 'daily_entries.patient_id', '=', 'patients.id')
        ->leftJoin('users', 'patients.user_id', '=', 'users.id')
        ->where('users.id', $userId)
        ->select('users.name as user_name','users.house as house', 'patients.patient_name', 'daily_entries.date')
        ->get();
        //dd($entries);
    return view('allEntries', compact('entries'));
}

public function myEntries(){

    $userId = Auth::id();
    // Get daily entries associated with the logged-in user
    // Define the raw SQL query
    $query = "
        SELECT users.name as user_name, users.house as house, patients.patient_name, daily_entries.date
        FROM daily_entries
        LEFT JOIN patients ON daily_entries.patient_id = patients.id
        LEFT JOIN users ON patients.user_id = users.id
        WHERE EXISTS (
            SELECT 1
            FROM patients AS p
            WHERE p.user_id = :userId
            AND p.id = daily_entries.patient_id
        )
    ";

    // Execute the raw SQL query with the user ID parameter
    $entries = DB::select($query, ['userId' => $userId]);

    return view('myEntries', compact('entries'));
}
    //public function allEntries(){

      //  $user = auth()->user();
        //$entries = DailyEntry::whereHas('patient.user', function ($query) use ($user) {
          //  $query->where('house_id', $user->house_id);
        //})->get();
    
        //return view('allEntries', compact('entries'));
        //$users = User::with('patients.dailyEntries')->get();
        //return view('allEntries', compact('users'));
   // }

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
