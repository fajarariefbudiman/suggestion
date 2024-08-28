<x-header title="Register" />
<main class="container-fluid form-container">
    <form method="POST" action="{{ route('register') }}" class="rounded bg-white pb-5 my-5 form-signin w-50 text-uppercase">
        @csrf
        <div class="form-header">
            <span class="text-uppercase fw-semibold fs-5">
                Register Now
            </span>
        </div>
        <div class="row">

            <!-- Username -->
            <div class="col-12 mb-3">
                <x-input-label for="username" :value="__('username')" />
                <input type="text" class="form-control form-control" id="username" name="username"
                    value="{{ old('username') }}" required>
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- fullname -->
            <div class="col-12 mb-3">
                <x-input-label for="fullname" :value="__('fullname')" />
                <input type="text" class="form-control form-control" id="fullname" name="fullname"
                    value="{{ old('fullname') }}" required>
                @error('fullname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="col-12 mb-3">
                <x-input-label for="email" :value="__('email')" />
                <input type="email" class="form-control form-control" id="email" name="email"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="col-12 mb-3">
                <x-input-label for="password" :value="__('password')" />
                <input type="password" class="form-control form-control" id="password" name="password"
                    value="{{ old('password') }}" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Repeat Password -->
            <div class="col-12 mb-3">
                <x-input-label for="password_confirmation" :value="__('password_confirmation')" />
                <input type="password" class="form-control form-control" id="password_confirmation"
                    name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</main>
<x-footer/>
