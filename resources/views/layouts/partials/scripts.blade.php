<a href="#" class="back-d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

  <script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        var studentId = button.getAttribute('data-id'); 
        
        var formAction = "/students/" + studentId; 
        var deleteForm = document.getElementById('deleteForm');
        deleteForm.action = formAction;
    });
    </script>
  <script src="{{ asset('js/main.js')}}"></script>

  <script>
    let table = new DataTable('#usersTable');
</script>
