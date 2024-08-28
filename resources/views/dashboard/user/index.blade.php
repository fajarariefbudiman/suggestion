<x-header title="Dashboard - Suggestion" />
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <x-sidebar-dashboard />
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <x-topbar-dashboard />
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Profile {{ auth()->user()->fullname }}</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=" mt-3">
                        <ul class="nav nav-tabs" id="profileTab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="tab"
                                    data-bs-target="#widget-tabbed-general" type="button" role="tab"
                                    aria-controls="widget-tabbed-general" aria-selected="true">General</button>
                            </li>

                        </ul>
                    </div>

                    <div class="tab-content mt-3" id="profileTabContent">

                        <!-- Form General -->
                        <x-form-general />

                    </div>

                    <div class="col-md-10">

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<x-footer />
