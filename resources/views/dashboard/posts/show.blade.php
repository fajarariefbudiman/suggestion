@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-8">
            <h2 class="mb-4 mt-4">{{ $post->title}}</h2>
            <a href="/dashboard/posts" class="btn btn-info mb-3 text-dark">
                <span data-feather="arrow-left" class="align-text-bottom text-dark"></span>Back To My Posts</a>

            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-3 text-dark">
                <span data-feather="edit" class="align-text-bottom text-dark"></span>Edit </a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger mb-3 text-dark" onclick="return confirm('Are You Sure?')">
                    <span data-feather="x-circle" class="align-text-bottom me-1 text-dark"></span>Delete</a></button>
                </form>
                @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid rounded">   
                </div> 
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="" class="img-fluid rounded">   
                @endif

            <h2>Category {{ $post->category->name }}</h2>
            <article class="my-3 fs-5">
                <p>{!! $post->body !!}</p>
            </article>
        </div>
    </div>
</div>
@endsection