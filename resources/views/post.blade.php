@extends('layout/main')
@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 mt-4">{{ $post->title}}</h2>
                @if ($post->image)
                     <div style="max-height: 400px; overflow:hidden;">
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid rounded">   
                     </div> 
                @else
            <img src="https://source.unsplash.com/1200x400/?{{ $post->category->name }}" alt="" class="img-fluid rounded">   
                 @endif

                <h2>By: {!! $post->author->name !!} in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></h2>
                <article class="my-3">
                    <p>{!! $post->body !!}</p>
                </article>
            
                <a href="/blog" class="pb-5">Back To Blog Page</a>
            </div>
        </div>
    </div>
  
@endsection
