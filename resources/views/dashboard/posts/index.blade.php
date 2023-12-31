@extends('dashboard.layout.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>  
  </div>

  @if (session()->has("success"))
  <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
   {{session("success")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive">
    <a href="/dashboard/posts/create" class="btn btn-primary">Create New Post</a>
    <table class="table table-striped table-sm fs-6">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      
            @foreach ($posts as $post)
            <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td><a href="/dashboard/posts/{{ $post->slug }}"> <span data-feather="eye" class="align-text-bottom"></span></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection