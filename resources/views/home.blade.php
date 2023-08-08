@extends('layouts.app')

@section('content')
    <div class="container">
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

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Patient</button>
                            </div>
                            <div class="form-group">
                                <a href = "/viewDailyEntry">Add Daily Entry</a>
                            </div>
                            <div class="form-group">
                                <a href = "/viewAllEntries">All Entries</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
St