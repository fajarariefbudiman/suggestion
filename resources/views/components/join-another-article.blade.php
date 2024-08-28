<div class="card mb-5 vh-100 rounded-0 bg-dark d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row text-light align-items-center">
            <div class="col-md-6 order-1 text-center text-md-start mb-5">
                <h1 style="font-size: 50px">Get the Scoop on Every New Article</h1>
            </div>

            <div class="col-md-6 d-flex justify-content-center justify-content-md-center order-2 mb-3 mb-md-0">
                <form action="#" method="POST" class="form-auth form-signin text-uppercase">
                    <div class="row">

                        <div class="col-md-8 mb-5">
                            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                            <input type="email" class="form-control text-white custom-placeholder form-control-half"
                                placeholder="Enter Your Email..." id="email" name="email"
                                value="{{ old('email') }}" required
                                style="border-bottom: 0.5px solid whitesmoke !important;" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="col-md-4 mb-5 mb-md-0">
                            <button type="button" class="btn btn-light px-5 py-2 rounded-pill fw-bold">Join</button>
                        </div>

                        <div class="col-12 custom-checkbox">

                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label fw-normal" for="exampleCheck1">I agree to the
                                    <span class="">Wix terms of Use</span></label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label fw-normal" for="exampleCheck1">Lorem ipsum dolor.</label>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
