@extends('layout.loginmain')
@section('container')


<div class="row justify-content-center"> 
  <div class="col-lg-8 mb-3">
    <main class="form-register w-100 m-auto mt-5">
      <form method="post" action="/register">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
    
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top 
          @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old("name") }}" autocomplete="off">
          <label for="name">Name</label>
          @error('name')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
            
          @enderror
        </div>

        <div class="form-floating">
          <input type="text" name="username" class="form-control 
          @error("username") is-invalid @enderror" id="username" placeholder="username" value="{{ old("username") }}" autocomplete="off">
          <label for="username">Username</label>
          @error('username')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" name="email" class="form-control 
          @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old("email") }}" autocomplete="off">
          <label for="email">Email address</label>
          @error('email')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>

          @enderror
        </div>

        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control rounded-bottom @error("password") is-invalid @enderror" id="password" placeholder="Password">
          <label for="password">Password</label>
          @error('password')

          <div id="validationServerUsernameFeedback" class="invalid-feedback">
            {{ $message }}
          </div>

          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
    </form>
    </main>
  </div>
</div>


@endsection