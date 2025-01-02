 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
            <i class="fas fa-solid fa-gauge"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if(Session::get('USERROLE') == 1)
        <li class="nav-item">
          <a class="nav-link collapsed" href="/users">
            <i class="fas fa-solid fa-user"></i>
            <span>User</span>
          </a>
        </li>
      @endif

      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-record-vinyl"></i><span>Classroom Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          {{-- @if(Session::get('USERROLE') == 1 || Session::get('USERROLE') == 2)
          <li>
            <a href="{{ route('students-information.index') }}" class="nav-link">
              <i class="bi bi-circle"></i> Students Information
          </a>
          </li>
          @endif
              <a href="#" class="nav-link">
                  <i class="bi bi-circle"></i> My Information
              </a>
          <li> --}}
            <li>
              @if(auth()->user()->role == 1 || auth()->user()->role == 2) 
                  <a href="{{ route('students-information.index') }}" class="nav-link">
                      <i class="bi bi-circle"></i> Students Information
                  </a>
              @elseif(auth()->user()->role == 3)
                  <a href="{{ route('students-information.show', auth()->user()->id) }}" class="nav-link">
                      <i class="bi bi-circle"></i> My Information
                  </a>
              @endif
          {{-- </li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Student Record Tables</span>
            </a>
          </li> --}}
        </ul>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="fa-solid fa-barcode"></i>
          <span>Grades</span>
        </a>
      </li><!-- End Dashboard Nav --> --}}
      
      <!-- End Tables Nav -->


    </ul>

  </aside><!-- End Sidebar-->