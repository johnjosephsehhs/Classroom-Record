@extends('admin.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            @if($user->role == 1)
                <h1 class="text-muted text-center" id="roleTitle">Admin Information</h1>
            @elseif($user->role == 2)
                <h1 class="text-muted text-center" id="roleTitle">Teacher Information</h1>
            @elseif($user->role == 3)
                <h1 class="text-muted text-center" id="roleTitle">Student Information</h1>
            @endif
            <a class="btn btn-secondary btn-sm ml-auto" href="/users">
                <i class="fa-solid fa-backward mr-1"></i>Back
            </a>
        </div>

        <div class="card-body mt-2">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if($user->role == 3)
                        @if ($user->img) 
                            <div>
                                <strong>Profile Picture:</strong>
                                <img src="{{ Storage::url('upload/images/' . $user->img) }}" alt="User Image" class="img-fluid" width="200">
                            </div>
                        @endif
                        <h4><strong>Student ID: </strong>{{ $user->student_id }}</h4>
                        <hr>
                        <h4><strong>First Name: </strong>{{ $user->first_name }}</h4>
                        <hr>
                        <h4><strong>Middle Name: </strong>{{ $user->middle_name }}</h4>
                        <hr>
                        <h4><strong>Last Name: </strong>{{ $user->last_name }}</h4>
                        <hr>
                        <h4><strong>Age: </strong>{{ $user->age }}</h4>
                        <hr>
                        <h4><strong>Course: </strong>{{ $user->course }}</h4>
                        <hr>
                        <h4><strong>Subject: </strong>{{ $user->subjects }}</h4>
                        <hr>
                        <h4><strong>Year: </strong>{{ $user->year }}</h4>
                        <hr>
                        <h4><strong>Address: </strong>{{ $user->address }}</h4>
                    @elseif($user->role == 2)
                        <h4><strong>First Name: </strong>{{ $user->first_name }}</h4>
                        <hr>
                        <h4><strong>Middle Name: </strong>{{ $user->middle_name }}</h4>
                        <hr>
                        <h4><strong>Last Name: </strong>{{ $user->last_name }}</h4>
                        <hr>
                        <h4><strong>Email: </strong>{{ $user->email }}</h4>
                    @elseif($user->role == 1)
                        <h4><strong>First Name: </strong>{{ $user->first_name }}</h4>
                        <hr>
                        <h4><strong>Middle Name: </strong>{{ $user->middle_name }}</h4>
                        <hr>
                        <h4><strong>Last Name: </strong>{{ $user->last_name }}</h4>
                        <hr>
                        <h4><strong>Email: </strong>{{ $user->email }}</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
