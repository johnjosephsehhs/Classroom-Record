@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h1 class="text-muted">Information</h1>
        
        <div class="btn-group">
            <a class="btn btn-primary btn-sm mr-2 edit-student-btn"  data-bs-toggle="modal"  data-bs-target="#editStudent"  
            data-id="{{ $student->id }}" 
            data-first_name="{{ $student->first_name }}" 
            data-middle_name="{{ $student->middle_name }}" 
            data-last_name="{{ $student->last_name }}" 
            data-email="{{ $student->email }}"
            data-student_id="{{ $student->student_id }}"
            data-age="{{ $student->age }}"
            data-course="{{ $student->course }}"
            data-year="{{ $student->year }}"
            data-address="{{ $student->address }}">
                <i class="fa-solid fa-pencil-alt"></i> Edit
            </a>
            <a class="btn btn-secondary btn-sm" href="{{ $userRole == 1 || $userRole == 2 ? '/students-information' : '/dashboard' }}">
                <i class="fa-solid fa-backward"></i> Back
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="header-box py-3 border-bottom mb-3">
            <h3 class="text-uppercase bg-primary p-2 text-light">Student Details</h3>
              <!-- Displaying the Image if Role is 3 -->
              @if ($student->role == 3 && $student->img) 
              <div class="row pl-2">
                  <div class="col-9">
                      <!-- <img src="{{ Storage::url('upload/images/' . $student->img) }}" class="img-profile rounded-circle w-25" alt="Student Image"> -->
                      <a href="{{ Storage::url('upload/images/' . $student->img) }}" data-lightbox="gallery" data-title="My Profile">
                                <img src="{{ Storage::url('upload/images/' . $student->img) }}" alt="User Image" class="img-fluid" width="200">
                        </a>
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
                <div class="col-3">Subject:</div>
                <div class="col-9 font-weight-bold">{{ $student->subjects }}</div>
            </div>
            <div class="row pl-2">
                <div class="col-3">Year:</div>
                <div class="col-9 font-weight-bold">{{ $student->year }}</div>
            </div>
        </div>
    </div>
</div>




@include('admin.students-information.partials.modal')
@include('admin.students-information.partials.scripts')

@endsection
