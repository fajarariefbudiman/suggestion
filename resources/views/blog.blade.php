@extends('layout/main')
@section('container')
    <h1 class="my-4 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="/blog" method="get">
                @if (request("category"))
                    <input type="hidden" name="category"  value="{{ request("category") }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Title" name="search" value="{{ request("search") }}">
                    <button class="btn btn-outline-dark" type="submit" >Search</button>
                  </div>
            </form>
        </div>
    </div>




    @if ($posts->count()) 
    <div class="card mb-3 text-center">
        @if ($posts[0]->image)
        <div style="max-height: 350px; overflow:hidden;">
            <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="" class="img-fluid rounded">   
        </div> 
        @else
            <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" alt="" class="img-fluid rounded">   
        @endif
        <div class="card-body">
          <h2 class="card-title">{{ $posts[0]->title }}</h2>

           <p> By: <a href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->username }}</a> in
             <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a></p>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          <p class="card-text"><small class="text-muted">{{ $posts[0]->created_at->diffForHumans() }}</small></p> 
        </div>
        <div class="container">
       <a href="/blog/{{ $posts[0]->slug }}"  class="text-decoration-none btn btn-secondary">Read more</a></p>
      </div>
    </div>
       <br>


      <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            
            <div class="col-md-4 mb-3" >
                <div class="card" >
              @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid rounded">   
                </div> 
                @else
                    <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="" class="img-fluid rounded">   
                @endif
                    <div class="card-body">
                        <h5 class="card-title"> {{ $post->title }}</h5>
                        <p> By: <a href="/blog?author={{ $post->author->username }}">{{ $post->author->username }}</a> in
                             <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                            <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p> 
                            <p class="card-text">{{ $post->excerpt}}</p>
                            <a href="/blog/{{ $post->slug }}" class="btn btn-secondary">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
      </div>
      @else
      <h3 class="text-center">Post Not Found</h3>
  @endif

  <div class="d-flex justify-content-start">
      {{ $posts->links() }}
  </div>

@endsection
