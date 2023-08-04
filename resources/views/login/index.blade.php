@extends('layout.loginmain')
@section('container')


<div class="row justify-content-center"> 
  <div class="col-7 mb-3 mx-5">

    @if (session()->has("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{session("success")}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has("loginerror"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{session("loginerror")}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin w-100 m-auto mt-5">
      <form action="/login" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
    
        <div class="form-floating">
          <input type="email" name="email" class="form-control bg-dark text-light 
          @error('email') is-invalid @enderror" id="email" placeholder="name@example.com"  value="{{ old("email") }}" autocomplete="off" required>
          <label for="email" class="text-light">Email address</label>
          @error('email')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>

          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control bg-dark text-light @error('password')
          is-invalid
      @enderror" id="password" placeholder="Password" required>
          <label for="password" class="text-light">Password</label>
          @error('password')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>

          @enderror
        </div>
          {{-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> --}}
        <button class="w-100 btn btn-lg btn-secondary mt-3" type="submit">Login</button>
     </form>
    <div class="small">

      <h6 class="mt-4 text-center">Don't have an account?<a href="/register" class="text-decoration-none text-secondary"> Sign Up</a></h6>
    </div>
    </main>
  </div>
</div>


@endsection