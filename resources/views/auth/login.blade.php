<x-header title="Login" />
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<main class="container form-container">
    <div class="row w-100">
        <div class="col-md-6">
            <form action="{{ route('login') }}" method="POST" class="form-auth rounded pb-5 form-signin text-uppercase">
                @csrf
                <div class="form-header">
                    <span class="text-uppercase fw-semibold fs-5">
                        Login To Your Account
                    </span>
                </div>

                <!-- Email -->
                <div class="col-12 mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <input type="email" class="form-control form-control" id="email" name="email"
                        value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="col-12 mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <input type="password" class="form-control form-control" id="password" name="password"
                        value="{{ old('password') }}" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <a href="/forgot-password" class="text-decoration-none"><span class="text-dark">Forgot
                            Password?</span> Click here</a>
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Login</button>
                <div class="mt-4 mb-3 d-flex justify-content-center align-items-center">
                    <a href="/register" class="text-decoration-none"><span class="text-dark">Need An Account</span>
                        Register Now</a>
                </div>
            </form>
        </div>

        <div class="col-md-1 d-flex justify-content-center align-items-center">
            <div class="vertical-line"></div>
        </div>

        <div class="col-md-5">
            <div
                class="rounde pb-5 form-signin text-uppercase d-flex flex-column align-items-center justify-content-center">
                <div class="form-header mb-4">
                    <span class="text-uppercase fw-semibold fs-5">
                        Login with Google
                    </span>
                </div>
                <a href="#" class="btn btn-danger w-75">
                    <i class="bi bi-google me-2"></i> Login with Google
                </a>
            </div>
        </div>

    </div>
</main>

<x-footer />
