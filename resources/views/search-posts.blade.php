<x-header title="Result - Search" />
<x-navbar :categories="$categories" />

<h1 class="text-center mb-5">Search Result</h1>

<div class="container mb-5">

    <div class="row justify-content-center mb-3">

        <div class="col-md-9">
            <form action="{{ route('search-posts') }}" method="GET" role="search" class="search-result">
                <input class="form-control search-input mb-5 w-100 border border-dark" type="search" name="q"
                    placeholder="Search" aria-label="Search" value="{{ request()->get('q') }}"
                    style="box-shadow: none !important">
            </form>
        </div>

        @if ($posts->isEmpty())
        <div class="row">

            <div class="col-md-9 text-center">
                <h3>Not Found</h3>
            </div>

            <h1 class="mb-5">Latest Article</h1>

            <div class="row">
                @foreach ($latestArticles as $latestArticle)
                    <div class="col-md-4 mb-4">
                        <div class="rounded border-left-secondary p-3">
                            <a href="{{ route('post-by-slug', ['slug' => $latestArticle->slug]) }}">
                                <img src="https://picsum.photos/800/400?{{ $latestArticle->category->name }} "
                                    alt="{{ $latestArticle->title }}" class="img-fluid rounded mb-3"
                                    style="height: 300px; width: 100%; object-fit: cover;">
                            </a>
                            <a href="{{ route('get-category-by-slug', ['slug' => $latestArticle->category->slug]) }}"
                                class="fs-5 text-decoration-none d-block mb-2 text-dark">
                                {{ $latestArticle->category->name }}
                            </a>
                            <a href="{{ route('post-by-slug', ['slug' => $latestArticle->slug]) }}"
                                class="fs-4 fw-bold text-decoration-none d-block mb-2 text-dark">
                                {{ $latestArticle->title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        @else
            @foreach ($posts as $post)
                <div class="row justify-content-center align-items-center mb-4">

                    <div class="col-md-2">
                        <img src="https://picsum.photos/800/500?{{ $post->category->name }}" alt=""
                            class="img-fluid rounded">
                    </div>

                    <div class="col-md-8">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->excerpt }}</p>
                    </div>
                </div>
            @endforeach
        @endif

        <div class="d-flex justify-content-center">
            {{ $posts->links('vendor.pagination.bootstrap-5') }}
        </div>

        <hr class="my-5">
        <h1 class="my-5">Latest Article</h1>

        <div class="row">
            @foreach ($latestArticles as $latestArticle)
                <div class="col-md-4 mb-4">
                    <div class="rounded border-left-secondary p-3">
                        <a href="{{ route('post-by-slug', ['slug' => $latestArticle->slug]) }}">
                            <img src="https://picsum.photos/800/400?{{ $latestArticle->category->name }} "
                                alt="{{ $latestArticle->title }}" class="img-fluid rounded mb-3"
                                style="height: 300px; width: 100%; object-fit: cover;">
                        </a>
                        <a href="{{ route('get-category-by-slug', ['slug' => $latestArticle->category->slug]) }}"
                            class="fs-5 text-decoration-none d-block mb-2 text-dark">
                            {{ $latestArticle->category->name }}
                        </a>
                        <a href="{{ route('post-by-slug', ['slug' => $latestArticle->slug]) }}"
                            class="fs-4 fw-bold text-decoration-none d-block mb-2 text-dark">
                            {{ $latestArticle->title }}
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
