@extends('layouts.auth')

@section('title', 'Reset Password')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <!--Title-->
        <div class="card-header">
            <h4>Reset Password</h4>
        </div>

        <!--Body-->
        <div class="card-body">
            <!--Text-->
            <p class="text-muted">We will send a link to reset your password</p>

            <!--Form-->
            <form method="POST">
                <!--Email-->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        tabindex="1"
                        required
                        autofocus>
                </div>

                <!--Password-->
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password"
                        type="password"
                        class="form-control pwstrength"
                        data-indicator="pwindicator"
                        name="password"
                        tabindex="2"
                        required>
                    <div id="pwindicator"
                        class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                </div>

                <!--Confirm Password-->
                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm"
                        type="password"
                        class="form-control"
                        name="confirm-password"
                        tabindex="2"
                        required>
                </div>

                <!--Button Reset Password-->
                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
