@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1>Profile Information</h1>
            <a class="btn btn-secondary btn-sm ml-auto" href="/dashboard">
                <i class="fa-solid fa-backward mr-1"></i>Back
            </a>
        </div>
        <div class="row">
            <div class="col-md-8 col-12 mx-auto"> 
                <div class="card-body"> 
                    @if ($user->img)
                        <div class="text-center mb-3">
                            <strong>Profile Picture:</strong><br>
                            <!-- <img src="{{ Storage::url('upload/images/' . $user->img) }}" alt="User Image" class="img-fluid" width="200"> -->
                            <a href="{{ Storage::url('upload/images/' . $user->img) }}" data-lightbox="gallery" data-title="My Profile">
                                <img src="{{ Storage::url('upload/images/' . $user->img) }}" alt="User Image" class="img-fluid" width="200">
                        </a>
                        </div>
                    @endif
            
                    @if ($user->role == 1)
                        <p class="badge badge-lg badge-primary mt-3" style="font-size:1.5em">Administrator</p>
                    @elseif($user->role == 2)
                        <p class="badge badge-lg badge-success mt-3" style="font-size:1.5em">Teacher</p>
                    @elseif($user->role == 3)
                        <p class="badge badge-lg badge-warning mt-3" style="font-size:1.5em">Student</p>
                    @endif
            
                    <h3 class="mt-0 editName item-hover" id="first_name">
                        <strong>First Name:</strong> {{ $user->first_name }}
                    </h3>
                    <h3 class="mt-0 editName item-hover" id="middle_name">
                        <strong>Middle Name:</strong> {{ $user->middle_name }}
                    </h3>
                    <h3 class="mt-0 editName item-hover" id="last_name">
                        <strong>Last Name:</strong> {{ $user->last_name }}
                    </h3>
                    <h3 class="mt-0 editName item-hover" id="email">
                        <strong>Email:</strong> {{ $user->email }}
                    </h3>
            
                    @if ($user->role == 3)
                        <h3 class="mt-0 editName item-hover" id="student_id">
                            <strong>Student ID:</strong> {{ $user->student_id }}
                        </h3>
                        <h3 class="mt-0 editName item-hover" id="age">
                            <strong>Age:</strong> {{ $user->age }}
                        </h3>
                        <h3 class="mt-0 editName item-hover" id="year">
                            <strong>Year:</strong> {{ $user->year }}
                        </h3>
                        <h3 class="mt-0 editName item-hover" id="address">
                            <strong>Address:</strong> {{ $user->address }}
                        </h3>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
@endsection
