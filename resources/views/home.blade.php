
@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Patient</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storePatient') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="house">House</label>
                                <input type="text" name="house" id="house" class="form-control" required>
                            </div>

                            {{-- Dropdown to select the associated user --}}
                            <div class="form-group">
                                <label for="user_id">Associated User</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Patient</button>
                            </div>
                            <br>
                            <div class="form-group">
                                <a href="/viewDailyEntry" class="btn btn-secondary">Add Daily Entry</a>
                            </div>
                            <br>
                            <div class="form-group">
                                <a href="/viewAllEntries" class="btn btn-secondary">All Entries</a>
                            </div>
                            <br>
                            <div class="form-group">
                            <a href="{{ route('logout') }}" class="btn btn-secondary">Logout</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection