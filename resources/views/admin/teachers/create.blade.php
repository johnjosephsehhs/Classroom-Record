@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fa-solid fa-plus"></i>
                Create New Subject
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        
            <form action="{{ route('teachers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="student_id">Student ID</label>
                    <select name="student_id" id="student_id" class="custom-select">
                        @if (isset($students) && $students->count() > 0)
                            <option value="" selected disabled>Select Student</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->student_id }}">{{ $student->first_name }} {{ $student->middle_name }}. {{ $student->last_name }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>No students available</option>
                        @endif
                    </select> 
                </div>

                <div class="form-group">
                    <label for="subjects">Subject</label>
                    <select class="form-control" id="subjects" name="subjects" required>
                        <option value="Programming1">Programming1</option>
                        <option value="Database">Database</option>
                        <option value="Integrative Programming">Integrative Programming</option>
                    </select>
                </div>

                <button type="submit" class="mt-2 btn btn-primary btn-sm">Create</button>
                <a href="{{route('teachers.index')}}" class="mt-2 btn btn-secondary btn-sm">Cancel</a>
            </form>
    </div>
</div>

@endsection