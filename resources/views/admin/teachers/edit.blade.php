@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fa-solid fa-edit"></i>
                Update Subject
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        
        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')  
            
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <select name="student_id" id="student_id" class="custom-select">
                    @if (isset($students) && $students->count() > 0)
                        <option value="" disabled>Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->student_id }}" 
                                {{ $teacher->student_id == $student->student_id ? 'selected' : '' }}>
                                {{ $student->first_name }} {{ $student->middle_name }}. {{ $student->last_name }}
                            </option>
                        @endforeach
                    @else
                        <option value="" disabled>No students available</option>
                    @endif
                </select> 
            </div>

            <div class="form-group">
                <label for="subjects">Subject</label>
                <select class="form-control" id="subjects" name="subjects" required>
                    <option value="Programming1" {{ $teacher->subjects == 'Programming1' ? 'selected' : '' }}>Programming1</option>
                    <option value="Database" {{ $teacher->subjects == 'Database' ? 'selected' : '' }}>Database</option>
                    <option value="Integrative Programming" {{ $teacher->subjects == 'Integrative Programming' ? 'selected' : '' }}>Integrative Programming</option>
                </select>
            </div>

            <button type="submit" class="mt-2 btn btn-success btn-sm">Update</button>
            <a href="{{ route('teachers.index') }}" class="mt-2 btn btn-secondary btn-sm">Cancel</a>
        </form>
    </div>
</div>

@endsection
