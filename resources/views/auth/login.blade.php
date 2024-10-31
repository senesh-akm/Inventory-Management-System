@extends('layouts.default')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                {{-- Success and Error Messages --}}
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Login Card --}}
                <div class="card mt-4">
                    <h2 class="card-header text-center">{{ __('Login') }}</h2>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf

                            {{-- Login Input (Email or Employee Number) --}}
                            <div class="form-group mb-3">
                                <label for="login" class="col-form-label">{{ __('User') }}</label>
                                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" placeholder="Email or Employee Number" required autofocus>

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Password Input --}}
                            <div class="form-group mb-3">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Your password" required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Remember Me Checkbox --}}
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            {{-- Submit Button --}}
                            <div class="form-group mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            {{-- Forgot Password Link --}}
                            @if (Route::has('password.request'))
                                <div class="mt-3">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
