@extends('layout.homemain')
@section('container')
<div class="content w-100 vh-100 d-flex justify-content-start align-items-center ps-5">
    <div class="box">
        @auth
        <h1>Hello {{ auth()->user()->username }}</h1>
        @else
        <h1>Hello World</h1>
        @endauth
        <a href="/blog"  class="post text-decoration-none btn btn-secondary mt-4 fs-4">All Posts</a>
        <a href="/categories"  class="category text-decoration-none btn btn-secondary mt-4 ms-3 fs-4">Categories</a>

       
    </div>
   
    <br>
   
</div>

 <br>

 <div class="card mb-3 text-center vh-100 bg-dark">
    <div class="container">
        <div style="max-height: 500px; overflow:hidden;">
            <img src="/img/suggestion.png" alt="" class="img-fluid rounded-pill mt-5">   
        </div> 
    </div>
    <div class="card-body">
        <h2 class="card-title text-light">"Tuliskan Kisahmu Disini"</h2>
        <h3 class="card-title text-light">Suggestion, tempat di mana setiap kata menjadi semangat, setiap pikiran menyala menjadi cahaya, dan setiap ide berkembang menjadi kenyataan yang memukau.</h3>
    </div>
</div>

<div class="container marketing mt-5 vh-100 mt-5 d-flex justify-content-center align-items-center">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-6">
            <img src="/img/Why.png" alt="" class="rounded-circle mb-3">
           
            <h4>"Membaca adalah petualangan tanpa batas, menjelajahi dunia tak terhingga dari balik halaman-halaman yang
                 membawa kita terbang jauh, merenung dalam hening, dan menghidupkan imajinasi dengan setiap kata yang tersusun."</h4>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-5 ms-3">
            <img src="/img/blog.png" alt="" class="rounded-circle mb-3">
            <h4>"Blog adalah jendela tak terbatas di dunia digital, di mana kata-kata membangun jembatan antara hati dan pikiran, membiarkan inspirasi mengalir dalam setiap garis yang ditulis."</h4>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>



@endsection