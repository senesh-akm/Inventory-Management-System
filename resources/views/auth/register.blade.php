@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
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

            {{-- Registration Form --}}
            <div class="card">
                <h2 class="card-header text-center">{{ __('Register') }}</h2>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf

                        {{-- Employee Number Input --}}
                        <div class="form-group mb-3">
                            <label for="empnumber" class="col-form-label">{{ __('Employee Number') }}</label>
                            <input id="empnumber" type="text" class="form-control @error('empnumber') is-invalid @enderror" name="empnumber" value="{{ old('empnumber') }}" required autofocus>

                            @error('empnumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Employee Name Input --}}
                        <div class="form-group mb-3">
                            <label for="empname" class="col-form-label">{{ __('Employee Name') }}</label>
                            <input id="empname" type="text" class="form-control @error('empname') is-invalid @enderror" name="empname" value="{{ old('empname') }}" required>

                            @error('empname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Email Input --}}
                        <div class="form-group mb-3">
                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Role Input --}}
                        <div class="form-group mb-3">
                            <label for="role" class="col-form-label">{{ __('Role') }}</label>
                            <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password Input --}}
                        <div class="form-group mb-3">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Confirm Password Input --}}
                        <div class="form-group mb-3">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        {{-- Submit Button --}}
                        <div class="form-group mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
