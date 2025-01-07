@extends('admin.admin')
    
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <i class="fas fa-solid fa-users"></i>
                    User
                </div>
            </div>
        </div>
        <div class="card-body ">

          @if (isset($success))
            <div class="alert alert-success mx-2">
              {{ $success }}
            </div>
          @endif

          <div class="container">
            <h1>Users Table</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>
        
            <table class="table table-bordered" id="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->middle_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->role == 1)
                                <span class="badge badge-primary">Administrator</span>
                            @elseif($user->role == 2)
                                <span class="badge badge-warning">Teacher</span>
                            @elseif($user->role == 3)
                                <span class="badge badge-secondary">Student</span>
                            @else
                                <span class="badge badge-dark">Unknown</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-primary mb-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm mb-1"><i class="fas fa-edit"></i></a>
                            <!-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-id="{{ $user->id }}">
                                <i class="fas fa-trash"></i>Delete
                            </button> -->
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $user->id }})">
                                        <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@include('admin.users.partials.script')

@endsection