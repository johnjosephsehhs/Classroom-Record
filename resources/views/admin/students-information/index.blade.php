@extends('admin.admin')

@section('content')
{{-- <div class="card">
    <div class="card-header">
        <h1 class="text-muted">Students Information Tables</h1>
    </div>

    <div class="card-body mt-2">
        <h5 class="text-uppercase">List</h5>
        <table class="table table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}
@if(auth()->user()->role == 1 || auth()->user()->role == 2)
    <div class="card">
        <div class="card-header">
            <h1 class="text-muted">Students Information Tables</h1>
        </div>
        <div class="card-body mt-2">
            <h5 class="text-uppercase">List</h5>
            <table class="table table-sm table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->first_name }} {{ $student->middle_name }}. {{ $student->last_name }}</td>
                            <td>
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <p>You do not have permission to view this page.</p>
@endif

@endsection
