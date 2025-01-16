


<script>

$('#submit-students').click(function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    var form = $('#students-upload');
    var formData = new FormData(form[0]);
    var id = form.data('id');  // Get the student ID dynamically from the form data attribute
    // var csrfToken = form.find('input[name="_token"]').val();  // Get the CSRF token from the form
    console.log('Student ID from modal:', id);

    $.ajax({
        url: '/students-information/' + id,  // Ensure the URL includes the student ID
        type: 'PUT',
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
            }
        data: formData,  // Sending the form data (including files)
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            Swal.fire({
                title: 'Success',
                text: "Student Information Updated!",
                icon: 'success',
                confirmButtonText: 'Okay'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();  // Reload the page to reflect changes
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Request failed with status: ' + status);
            Swal.fire({
                title: 'Error',
                text: "There was an error updating the information.",
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        }
    });
});

</script>
