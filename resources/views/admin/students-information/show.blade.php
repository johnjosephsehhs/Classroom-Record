@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="text-muted">Information</h1>
        <a class="btn btn-secondary btn-sm ml-auto" href="{{ $userRole == 1 || $userRole == 2 ? '/students-information' : '/dashboard' }}">
            <i class="fa-solid fa-backward mr-1"></i>Back
        </a>
    </div>

    <div class="card-body">
        <div class="header-box py-3 border-bottom mb-3">
            <h3 class="text-uppercase bg-primary p-2 text-light">Student Details</h3>
              <!-- Displaying the Image if Role is 3 -->
              @if ($student->role == 3 && $student->img) 
              <div class="row pl-2">
                  <div class="col-9">
                      <img src="{{ Storage::url('upload/images/' . $student->img) }}" class="img-profile rounded-circle w-25" alt="Student Image">
                  </div>
              </div>
          @else
              <div class="row pl-2">
                  <div class="col-3">Picture:</div>
                  <div class="col-9 font-weight-bold">No Image Available</div>
              </div>
          @endif
            <div class="row pl-2">
                <div class="col-3">Name:</div>
                <div class="col-9 font-weight-bold">{{ $student->first_name }} {{ $student->middle_name }}. {{ $student->last_name }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Address:</div>
                <div class="col-9 font-weight-bold">{{ $student->address }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Student ID:</div>
                <div class="col-9 font-weight-bold">{{ $student->student_id }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Email:</div>
                <div class="col-9 font-weight-bold">{{ $student->email }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Age:</div>
                <div class="col-9 font-weight-bold">{{ $student->age }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Course:</div>
                <div class="col-9 font-weight-bold">{{ $student->course }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Year:</div>
                <div class="col-9 font-weight-bold">{{ $student->year }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
