@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fa-solid fa-pen"></i>
                Edit User
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control" id="img" placeholder="Image" name="img">
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}">
            </div>
            
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Administrator</option>
                    <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Teacher</option>
                    <option value="3" {{ old('role', $user->role) == 3 ? 'selected' : '' }}>Student</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            
            <!-- Display student fields only if role is "Student" -->
            <div class="form-group" id="studentFields" style="{{ old('role', $user->role) == 3 ? 'display:block;' : 'display:none;' }}">
                <label for="student_id">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" value="{{ old('student_id', $user->student_id) }}">

                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $user->age) }}">

                <div class="form-group">
                    <label for="course">Course</label>
                    <select class="form-control" id="course" name="course" required>
                        <option value="BSIT" {{ old('course', $user->course) == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                        <option value="BEED" {{ old('course', $user->course) == 'BEED' ? 'selected' : '' }}>BEED</option>
                        <option value="BSED" {{ old('course', $user->course) == 'BSED' ? 'selected' : '' }}>BSED</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <select class="form-control" id="year" name="year" required>
                        <option value="1st" {{ old('year', $user->year) == 1 ? 'selected' : '' }}>1st</option>
                        <option value="2nd" {{ old('year', $user->year) == 2 ? 'selected' : '' }}>2nd</option>
                        <option value="3rd" {{ old('year', $user->year) == 3 ? 'selected' : '' }}>3rd</option>
                        <option value="4th" {{ old('year', $user->year) == 4 ? 'selected' : '' }}>4th</option>
                    </select>
                </div>

                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $user->address) }}">
            </div>
            
            <button type="submit" class="mt-2 btn btn-primary btn-sm">Update</button>
            <a href="{{ route('users.index') }}" class="mt-2 btn btn-secondary btn-sm">Cancel</a>
        </form>
    </div>
</div>

<script>
    document.getElementById('role').addEventListener('change', function() {
        var studentFields = document.getElementById('studentFields');
        if (this.value == '3') {
            studentFields.style.display = 'block'; 
        } else {
            studentFields.style.display = 'none'; 
        }
    });
</script>
@endsection
