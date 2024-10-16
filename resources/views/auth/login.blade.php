@extends("layouts.default")

@section("title", "Login")

@section("content")
    <main class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    {{-- Success Message --}}
                    @if (session()->has("success"))
                        <div class="alert alert-success">
                            {{ session()->get("success") }}
                        </div>
                    @endif
                    {{-- Error Message --}}
                    @if (session()->has("error"))
                        <div class="alert alert-danger">
                            {{ session()->get("error") }}
                        </div>
                    @endif

                    {{-- Login Card --}}
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                {{-- Email Input --}}
                                <div class="mb-3">
                                    <input type="email" placeholder="Email" name="email" class="form-control" required autofocus>
                                    @if ($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                {{-- Password Input --}}
                                <div class="mb-3">
                                    <input type="password" placeholder="Password" name="password" class="form-control" required>
                                    @if ($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>

                                {{-- Remember Me Checkbox --}}
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                                </div>

                                {{-- Submit Button --}}
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
