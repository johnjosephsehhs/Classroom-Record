<script>
    // When the Edit button is clicked
    $('.edit-student-btn').click(function() {
        var Id = $(this).data('id');  // Get ID
        console.log('Current ID:', Id);  // Log the ID to check if it's being set
        var firstName = $(this).data('first_name');
        var middleName = $(this).data('middle_name');
        var lastName = $(this).data('last_name');
        var email = $(this).data('email');
        var studentIdField = $(this).data('student_id');
        var age = $(this).data('age');
        var course = $(this).data('course');
        var year = $(this).data('year');
        var address = $(this).data('address');

        // Populate modal form fields with the student data
        $('#editStudent #first_name').val(firstName);
        $('#editStudent #middle_name').val(middleName);
        $('#editStudent #last_name').val(lastName);
        $('#editStudent #email').val(email);
        $('#editStudent #student_id').val(studentIdField);
        $('#editStudent #age').val(age);
        $('#editStudent #course').val(course);
        $('#editStudent #year').val(year);
        $('#editStudent #address').val(address);

        // Set the student ID in the form data for the AJAX request
        $('#editStudent #id').val(Id);  // Set the ID in the input field
    });

</script>
<!-- Modal -->
<div class="modal fade" id="editStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header rounded-3">
          <h5 class="modal-title" id="#exampleModalLabel">Edit Information</h5>
        </div>
            <form action="#" id="students-upload" method="POST" enctype="multipart/form-data">  
              @csrf
              @method('PUT') 
              <input type="hidden" id="id" name="id">
              <div class="modal-body rounded-3">
                
                <div class="form-group">
                    <label for="img">Image</label>
                    <input type="file" class="form-control" id="img" placeholder="Image" name="img">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                </div>
                
                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="">
                </div>
                
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="" required>
                </div>
            
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="" required>
                </div>
                
                <!-- Display student fields only if role is "Student" -->
                <div class="form-group" id="studentFields" style="">
                    <label for="student_id">Student ID</label>
                    <input type="text" class="form-control" id="student_id" name="student_id" value="">

                    <label for="age">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="">

                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control" id="course" name="course" required>
                            <option value="BSIT" >BSIT</option>
                            <option value="BEED" >BEED</option>
                            <option value="BSED" >BSED</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <select class="form-control" id="year" name="year" required>
                            <option value="1st" >1st</option>
                            <option value="2nd" >2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th" >4th</option>
                        </select>
                    </div>

                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="">
            </div>
                
              </div>
              <div class="modal-footer rounded-3">
                <input type="submit" value="Update" id="submit-students" class="btn btn-success btn-sm">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
              </div>
            </form>    
      </div>
    </div>
  </div>
  <!-- End Modal -->


 