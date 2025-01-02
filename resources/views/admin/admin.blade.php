{{-- @extends('layouts.app') --}}

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-6 col-12">
                        <i class="fas fa-solid fa-user"></i>
                        Student
                    </div>
                </div>
                <div class="card-body">
                    @if (isset($success))
                        <div class="alert alert-success mx-2">
                            {{ $success }}
                        </div>
                     @endif
                    <table class="table">
                        <caption>Students Table</caption>
                        <thead class="thead-dark">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Example</td>
                                    <td>Example</td>
                                    <td>Example</td>
                                    <td>Example</td>
                                    <td>Example</td>
                                    <td>Example</td>
                                    <td>
                                        <button class="btn btn-warning m-1">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection --}}
@include('layouts.partials.header')
    
    <div id="app">

        <div id="wrapper">
            @include('layouts.partials.sidebar')
            <main id="content-area">
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content" class="pb-2">

                        @include('layouts.partials.topbar')

                        <!-- Begin Page Content -->
                        <div class="row mt-5">
                            <div class="col-12 col-md-8  offset-md-3 mt-5">
                                @yield('content')
                            </div>
                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    @include('layouts.partials.footer')

                </div>
                <!-- End of Content Wrapper -->
            </main>
        </div>
    </div>

    @include('layouts.partials.logout-modal')

    @include('layouts.partials.scripts')

    {{-- @include('layouts.partials._footer') --}}