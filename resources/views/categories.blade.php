<x-header title="{{ $category->name }}" />
<x-navbar :categories="$categories" />

<div class="container">

    <h1 class="text-center mb-4" style="font-size: 70px">{{ $category->name }}</h1>
    <p class="mb-5 fs-5 fw-semibold text-center"> {{ $category->description }}</p>


    <div class="row">

        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="p-3">
                    <a href="{{ route('post-by-slug', ['slug' => $post->slug]) }}">
                        <img src="https://picsum.photos/800/400" alt="Featured Image 1" class="img-fluid rounded mb-3"
                            style="height: 300px; width: 100%; object-fit: cover;">
                    </a>
                    <a href="{{ route('get-category-by-slug', ['slug' => $post->category->name]) }}"
                        class="fs-5 text-decoration-none d-block mb-2 text-dark">
                        {{ $post->category->name }}
                    </a>
                    <a href="{{ route('post-by-slug', ['slug' => $post->slug]) }}"
                        class="fs-4 fw-bold text-decoration-none d-block mb-2 text-dark">
                        {{ $post->title }}
                    </a>
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center my-5">
            {{ $posts->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>

    <hr>

    <h1 class="my-5 text-center">More Categories</h1>


    <div class="row">
        @foreach ($otherPostCategories as $moreCategories => $posts)
            <h1 class="my-5">{{ $moreCategories }}</h1>
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="rounded border-left-secondary p-3">
                        <a href="{{ route('post-by-slug', ['slug' => $post->slug]) }}">
                            <img src="https://picsum.photos/800/400?{{ $post->category->name }} "
                                alt="{{ $post->title }}" class="img-fluid rounded mb-3"
                                style="height: 300px; width: 100%; object-fit: cover;">
                        </a>
                        <a href="{{ route('get-category-by-slug', ['slug' => $post->category->slug]) }}"
                            class="fs-5 text-decoration-none d-block mb-2 text-dark">
                            {{ $post->category->name }}
                        </a>
                        <a href="{{ route('post-by-slug', ['slug' => $post->slug]) }}"
                            class="fs-4 fw-bold text-decoration-none d-block mb-2 text-dark">
                            {{ $post->title }}
                        </a>
                    </div>
                </div>
            @endforeach
            <hr class="my-4">
        @endforeach
    </div>


</div>

<x-join-another-article />
<x-footer-view />
<x-footer />
