@extends('layout.loginmain')
@section('container')


<div class="row justify-content-center align-items-center d-flex"> 
  <div class="col-8 mb-3">
    <main class="form-register w-100 m-auto mt-5">
      <form method="post" action="/register">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center text-light">Regi<span class="text-dark">ster</span></h1>
    
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top bg-dark text-light
          @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old("name") }}" autocomplete="off">
          <label for="name" class="text-light">Name</label>
          @error('name')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
            
          @enderror
        </div>

        <div class="form-floating">
          <input type="text" name="username" class="form-control bg-dark text-light
          @error("username") is-invalid @enderror" id="username" placeholder="username" value="{{ old("username") }}" autocomplete="off">
          <label for="username" class="text-light">Username</label>
          @error('username')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" name="email" class="form-control bg-dark text-light 
          @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old("email") }}" autocomplete="off">
          <label for="email" class="text-light">Email address</label>
          @error('email')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>

          @enderror
        </div>

        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control rounded-bottom bg-dark text-light @error("password") is-invalid @enderror" id="password" placeholder="Password">
          <label for="password" class="text-light">Password</label>
          @error('password')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>

          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-secondary" type="submit">Sign Up</button>
    </form>
    <div class="small">

      <h6 class="mt-4 text-center text-light">Have an <span class="text-dark me-2">account?</span><a href="/login" class="text-decoration-none text-secondary">Login</a></h6>
    </main>
  </div>
</div>


@endsection