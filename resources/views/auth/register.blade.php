@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
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
            <h2>{{ __('Add Employee') }}</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Employee Image Input --}}
                        <div class="form-group mb-3 row">
                            {{-- Image Preview on the left --}}
                            <div class="col-md-3 d-flex justify-content-center align-items-center">
                                <div id="imagePreview" class="border rounded" style="width: 150px; height: 150px; background-size: cover; background-position: center; background-color: #f0f0f0;">
                                    <span class="text-muted" id="noImageText">No Image</span>
                                </div>
                            </div>

                            {{-- Image Upload Input on the right --}}
                            <div class="col-md-9">
                                <label for="emp_image" class="col-form-label">{{ __('Employee Image') }}</label>
                                <input id="emp_image" type="file" class="form-control @error('emp_image') is-invalid @enderror" name="emp_image" accept="image/*" onchange="previewImage(event)">
                                @error('emp_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Employee Number Input --}}
                            <div class="form-group mb-3 col-md-4">
                                <label for="empnumber" class="col-form-label">{{ __('Employee Number') }}</label>
                                <input id="empnumber" type="text" class="form-control @error('empnumber') is-invalid @enderror" name="empnumber" value="{{ old('empnumber') }}" required autofocus placeholder="e.g.: EMP001">
                                @error('empnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Employee Name Input --}}
                            <div class="form-group mb-3 col-md-4">
                                <label for="empname" class="col-form-label">{{ __('Employee Name') }}</label>
                                <input id="empname" type="text" class="form-control @error('empname') is-invalid @enderror" name="empname" value="{{ old('empname') }}" required placeholder="e.g.: John Doe">
                                @error('empname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Email Input --}}
                            <div class="form-group mb-3 col-md-4">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="e.g.: john.doe@example.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- Role Input --}}
                            <div class="form-group mb-3 col-md-4">
                                <label for="role" class="col-form-label">{{ __('Designation') }}</label>
                                <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required placeholder="e.g.: Administrator">
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Password Input --}}
                            <div class="form-group mb-3 position-relative col-md-4">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="e.g.: Your Password" onkeyup="checkPasswordMatch()">
                                    <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon')">
                                        <i id="togglePasswordIcon" class="bi bi-eye-slash"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- Confirm Password Input --}}
                            <div class="form-group mb-3 position-relative col-md-4">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="e.g.: Your Password" onkeyup="checkPasswordMatch()">
                                    <span class="input-group-text" onclick="togglePassword('password-confirm', 'toggleConfirmPasswordIcon')">
                                        <i id="toggleConfirmPasswordIcon" class="bi bi-eye-slash"></i>
                                    </span>
                                </div>
                                <small id="passwordMatchMessage" class="text-danger"></small>
                            </div>
                        </div>

                        {{-- Is Active Checkbox --}}
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                {{ __('Is Active') }}
                            </label>
                        </div>

                        {{-- Submit Button --}}
                        <div class="form-group mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" id="registerButton" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <h2 class="mt-4">{{ __('Employees List') }}</h2>
            <div class="card">
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>{{ __('Employee Number') }}</th>
                                <th>{{ __('Employee Name') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->empnumber }}</td>
                                    <td>{{ $user->empname }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        @if ($user->is_active)
                                            <span class="badge bg-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('Inactive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('register.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const noImageText = document.getElementById('noImageText');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.style.backgroundImage = `url(${e.target.result})`;
                    noImageText.style.display = 'none';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.backgroundImage = '';
                noImageText.style.display = 'block';
            }
        }

        function togglePassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password-confirm').value;
            const message = document.getElementById('passwordMatchMessage');
            const registerButton = document.getElementById('registerButton');

            if (password !== confirmPassword) {
                message.textContent = "Passwords do not match";
                message.classList.add('text-danger');
                registerButton.disabled = true;
            } else {
                message.textContent = "Passwords match";
                message.classList.remove('text-danger');
                message.classList.add('text-success');
                registerButton.disabled = false;
            }
        }
    </script>
@endsection
