<x-header title="{{ $title }}" />
<x-navbar :categories="$categories" />

<div class="container">
    <div class="row">
        <div class="row">

            <div class="col-md-6 order-2 order-md-1">
                <div class="p-3">
                    <a href="{{ route('get-category-by-slug', ['slug' => $posts[0]->category->slug]) }}"
                        class="fs-5 mb-4 text-decoration-none d-block text-dark">
                        {{ $posts[0]->category->name }}
                    </a>
                    <a href="{{ route('post-by-slug', ['slug' => $posts[0]->slug]) }}"
                        class="fs-2 fw-bold text-decoration-none d-block mb-2 text-dark">
                        {{ $posts[0]->title }}
                    </a>
                    <p class="fs-6 my-4 fw-semibold">{{ $posts[0]->excerpt }}</p>
                    <a href="{{ route('post-by-slug', ['slug' => $posts[0]->slug]) }}"
                        class="text-decoration-none text-dark fw-semibold fs-5">Read
                        More <span>-></span></a>
                </div>
            </div>

            <div class="col-md-6 d-flex justify-content-end order-1 order-md-2 mb-3 mb-md-0">
                <div class="rounded align-items-end p-3">
                    <a href="{{ route('post-by-slug', ['slug' => $posts[0]->slug]) }}">
                        <img src="https://picsum.photos/800/400?{{ $posts[0]->category->name }}"
                            alt="{{ $posts[0]->title }}" class="img-fluid rounded" style="width: auto; height: 400px;">
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-5">
        <h1 class="mb-5">Top Articles</h1>

        <div class="row">
            @foreach ($topArticles as $topArticle)
                <div class="col-md-4 mb-4">
                    <div class="rounded border-left-secondary p-3">
                        <a href="{{ route('post-by-slug', ['slug' => $topArticle->slug]) }}">
                            <img src="https://picsum.photos/800/400?{{ $topArticle->category->name }} "
                                alt="{{ $topArticle->title }}" class="img-fluid rounded mb-3"
                                style="height: 300px; width: 100%; object-fit: cover;">
                        </a>
                        <a href="{{ route('get-category-by-slug', ['slug' => $topArticle->category->slug]) }}"
                            class="fs-5 text-decoration-none d-block mb-2 text-dark">
                            {{ $topArticle->category->name }}
                        </a>
                        <a href="{{ route('post-by-slug', ['slug' => $topArticle->slug]) }}"
                            class="fs-4 fw-bold text-decoration-none d-block mb-2 text-dark">
                            {{ $topArticle->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<x-join-another-article />
<x-footer-view />
<x-footer />
