 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item" {{ request()->is('dashboard') ? 'active' : '' }}>
      
        <a class="nav-link " href="/dashboard">
            <i class="fas fa-solid fa-gauge"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if(Session::get('USERROLE') == 1)
          <li class="nav-item"   {{ request()->routeIs('users.index') || request()->routeIs('users.create') || request()->routeIs('users.edit') || request()->routeIs('users.show') ? 'active' : '' }}>
            <a class="nav-link" href="{{ route('users.index')}}">
              <i class="fas fa-solid fa-users"></i>
              <span>User</span>
            </a>
          </li>
      @endif

      @if(Session::get('USERROLE') == 1 || Session::get('USERROLE') == 2)
          <li class="nav-item"   {{ request()->routeIs('teachers.index') || request()->routeIs('teachers.create') || request()->routeIs('teachers.edit') || request()->routeIs('teachers.show') ? 'active' : '' }}>
            <a class="nav-link" href="{{ route('teachers.index')}}">
              <i class="fas fa-solid fa-users"></i>
              <span>Teacher</span>
            </a>
          </li>
      @endif
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="fa-solid fa-record-vinyl"></i><span>Classroom Record</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
        </ul>
      </li>

      
      
      <!-- End Tables Nav -->


    </ul>

  </aside><!-- End Sidebar-->

