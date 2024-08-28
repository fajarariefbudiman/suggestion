<x-header title="{{ $title }}" />
<x-navbar :categories="$categories" />
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <h1 class="text-center mb-4" style="font-size: 70px">{{ $post->title }}</h1>
            <p class="mb-5 fs-5 fw-semibold text-center">
                <a href="{{ route('get-category-by-slug', ['slug' => $post->category->slug]) }}">
                    {{ $post->category->name }}
                </a>
            </p>
            @if ($post->image)
                <div style="max-height: 1000px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid rounded">
                </div>
            @else
                <img src="https://picsum.photos/800/400/?{{ $post->category->name }}" alt=""
                    class="img-fluid rounded mb-4">
            @endif

            <h2>By: {!! $post->author->fullname !!}
            </h2>
            <article class="my-3">
                <p>{!! $post->body !!}</p>
            </article>

            <a href="/blog" class="pb-5">Back To Blog Page</a>
        </div>
    </div>
</div>
<x-join-another-article />
<x-footer-view />
<x-footer />
