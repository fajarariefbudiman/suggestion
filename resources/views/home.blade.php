<x-header title="Home" />

<x-homenav />

<div class="content w-100 vh-100 d-flex justify-content-start align-items-center ps-5">
    <div class="box container">
        @auth
            <h1>Hello {{ auth()->user()->username }}</h1>
        @else
            <h1>Hello World</h1>
        @endauth
        <a href="/blog" class="post text-decoration-none border-0 btn btn-secondary mt-4 fs-4 fw-bold">All Posts</a>
        <a href="/about"
            class="category text-decoration-none border-0 btn btn-secondary mt-4 ms-3 fs-4 fw-bold">About</a>
    </div>
    <br>
</div>

<br>

<div class="card mb-3 text-center vh-100 rounded-0 bg-dark" style="overflow: hidden;">
    <div class="container">
        <div style="max-height: 500px; overflow: hidden;">
            <img src="/img/suggestion.png" alt="" class="img-fluid rounded-pill mt-5"
                style="max-width: 100%; height: auto;">
        </div>
    </div>
    <div class="card-body">
        <h2 class="card-title text-light">"Tuliskan Kisahmu Disini"</h2>
        <h3 class="card-title text-light">Suggestion, tempat di mana setiap kata menjadi semangat, setiap pikiran
            menyala menjadi cahaya, dan setiap ide berkembang menjadi kenyataan yang memukau.</h3>
    </div>
</div>

<div class="container marketing vh-100 mt-5 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-lg-6">
            <img src="/img/Why.png" alt="" class="rounded-circle mb-3" style="max-width: 100%; height: auto;">
            <h4>"Membaca adalah petualangan tanpa batas, menjelajahi dunia tak terhingga dari balik halaman-halaman yang
                membawa kita terbang jauh, merenung dalam hening, dan menghidupkan imajinasi dengan setiap kata yang
                tersusun."</h4>
        </div>
        <div class="col-lg-5 ms-3">
            <img src="/img/blog.png" alt="" class="rounded-circle mb-3" style="max-width: 100%; height: auto;">
            <h4>"Blog adalah jendela tak terbatas di dunia digital, di mana kata-kata membangun jembatan antara hati dan
                pikiran, membiarkan inspirasi mengalir dalam setiap garis yang ditulis."</h4>
        </div>
    </div>
</div>

<x-footer-view />
<x-footer />
