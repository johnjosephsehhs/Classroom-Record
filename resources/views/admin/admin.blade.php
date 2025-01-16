
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