@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Daily Entry</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeEntry') }}">
                            @csrf
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>
                            {{-- Dropdown to select the associated patient --}}
                            <div class="form-group">
                                <label for="patient_id">Patient</label>
                                <select name="patient_id" id="patient_id" class="form-control" required>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                           <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Daily Entry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
