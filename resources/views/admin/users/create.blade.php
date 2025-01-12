@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 col-12">
                <i class="fa-solid fa-plus"></i>
                Create New User
            </div>
        </div>
    </div>
    <div class="card-body mt-2">
        
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="img">Image</label>
                    <input type="file" class="form-control" id="img" placeholder="Image" name="img">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="1">Administrator</option>
                        <option value="2">Teacher</option>
                        <option value="3">Student</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <!-- Display student fields only if role is "Student" -->
                <div class="form-group" id="studentFields" style="display: none;">
                    <label for="student_id">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id">

                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age">

                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control" id="course" name="course" required>
                            <option value="BSIT">Information Technology</option>
                            <option value="BEED">Elementary Education</option>
                            <option value="BSED">BSED Mathematics</option>
                            <option value="BSED">BSED Social Studies</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <select class="form-control" id="year" name="year" required>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                        </select>
                    </div>

                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="password">Temporary Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="mt-2 btn btn-primary btn-sm">Create</button>
                <a href="{{route('users.index')}}" class="mt-2 btn btn-secondary btn-sm">Cancel</a>
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