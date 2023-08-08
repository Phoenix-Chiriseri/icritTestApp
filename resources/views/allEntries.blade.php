@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
    <div class="container">
        <h1>All Entries</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Patient Name</th>
                    <th>House</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{ $entry->user_name }}</td>
                        <td>{{ $entry->patient_name }}</td>
                        <td>{{ $entry->patient_patient_name }}</td>
                        <td>{{ $entry->house }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
