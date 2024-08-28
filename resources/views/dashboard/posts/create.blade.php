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

                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h1 class="h2">Create New Posts</h1>
                        </div>
                        <div class="col-lg-9">
                            <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ old('slug') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" name="category_id">
                                        @foreach ($categories as $category)
                                            @if (old('category_id') == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                </option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Please Upload Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image">
                                    @error('image')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    @error('body')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                                    <trix-editor input="body"></trix-editor>
                                </div>

                                <button type="submit" class="btn btn-primary mb-3">Submit</button>
                            </form>
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
