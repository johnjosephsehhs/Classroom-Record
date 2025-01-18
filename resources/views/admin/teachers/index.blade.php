@extends('admin.admin')
    
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h3 class="m-0 font-weight-bold"><i class="fas fa-solid fa-users"></i> <b>Teachers</b> </h3>
                </div>
                <div class="col-md-6 col-12 text-right">
                    <a href="{{ route('teachers.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-solid fa-plus"></i> Add New Subject</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success mt-2 mx-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="container">
                <caption>Teachers Tables</caption>
                
                <!-- Wrap the table inside a table-responsive div for mobile scrolling -->
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="usersTable">
                        <thead>
                            <tr>
                              
                                <th>Student ID</th>
                                <th>Subjects</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                            <tr>
                                
                                <td>{{ $teacher->student_id }}</td>
                                <td>{{ $teacher->subjects }}</td>
                                <td>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $teacher->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('admin.teachers.partials.script')

@endsection
