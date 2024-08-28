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
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->

                    <div class="col-md-10">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-md-8">
                                    <h2 class="mb-4 mt-4">{{ $post->title }}</h2>
                                    <a href="/dashboard/posts" class="btn btn-info mb-3 text-dark">
                                        <span data-feather="arrow-left" class="align-text-bottom text-dark"></span> Back
                                        To My Posts
                                    </a>
                                    <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                        class="btn btn-warning mb-3 text-dark">
                                        <span data-feather="edit" class="align-text-bottom text-dark"></span> Edit
                                    </a>
                                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger mb-3 text-dark"
                                            onclick="return confirm('Are You Sure?')">
                                            <span data-feather="x-circle"
                                                class="align-text-bottom me-1 text-dark"></span> Delete
                                        </button>
                                    </form>
                                    @if ($post->image)
                                        <div style="max-height: 350px; overflow:hidden;">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                                class="img-fluid rounded">
                                        </div>
                                    @else
                                        <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}"
                                            alt="" class="img-fluid rounded">
                                    @endif
                                    <h2>Category: {{ $post->category->name }}</h2>
                                    <article class="my-3 fs-5">
                                        <p>{!! $post->body !!}</p>
                                    </article>
                                </div>
                            </div>
                        </div>
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
