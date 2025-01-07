@extends('admin.admin')

@section('content')

    <div class="card mt-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 col-12">
                    <h1><i class="fa fa-solid fa-users mt-2"></i> List of Students</h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-stripped table-column" id="UsersTable">
                  
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="usersTable">
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
    

<script>
        document.addEventListener('DOMContentLoaded', function() {
        const corsProxy = "https://api.allorigins.win/get?url=";
        const apiUrl = encodeURIComponent("https://freetestapi.com/api/v1/students");
        
        fetch(corsProxy + apiUrl)
            .then((res) => res.json())
            .then((data) => {
                const users = JSON.parse(data.contents); // Parse the 'contents' field
                console.log(users);

                for (let i = 0; i < users.length; i++) {
                    const address = users[i].address ? users[i].address.street : "N/A";
                    const course = users[i].courses && users[i].courses.length > 0 ? users[i].courses[0] : "N/A";

                    var row = "<tr>" +
                   
                    
                        "<td>" + users[i].id + "</td>" +
                        "<td>" + users[i].name + "</td>" +
                        "<td>" + users[i].age + "</td>" +
                        "<td>" + users[i].gender + "</td>" +
                        "<td>" + users[i].address + "</td>" +
                        "<td>" + users[i].email + "</td>" +
                        "<td>" + users[i].phone + "</td>" +
                        "<td>" + users[i].course + "</td>" +
                        "<td>" +
                           `<a href="" class='editUser btn btn-primary btn-sm' title='Edit Button'><i class='fa fa-solid fa-eye'></i> </a> ` + 
                            `<a href="" class='editUser btn btn-warning btn-sm' title='Edit Button'><i class='fa fa-solid fa-edit'></i> </a> ` +
                            `<a class='deleteUser btn btn-danger btn-sm' data-user-id=''  title='Delete Button' ><i class='fa fa-solid fa-trash'></i> </a>` +
                        "</td>" +
                        "</tr>";
                    document.getElementById('usersTable').innerHTML += row;
                }
            })
            .catch((error) => console.log('Error fetching data:', error));
    });


</script>


@endsection