@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
    <div class="container">
        <h2>{{ __('User Profile') }}</h2>

        {{-- Profile Image Section --}}
        <div class="row mb-4">
            <div class="col-md-3">
                <div id="profileImagePreview" class="border rounded mb-3" style="width: 150px; height: 150px; background-size: cover; background-position: center; background-color: #f0f0f0;">
                    @if($user->emp_image)
                        <img src="{{ asset('storage/' . $user->emp_image) }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile" style="width: 100%; height: 100%; object-fit: cover;">
                    @endif
                </div>
                <input type="file" id="profileImageInput" class="form-control" accept="image/*" onchange="previewProfileImage(event)">
            </div>
        </div>

        {{-- User Details Form --}}
        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Employee Number --}}
                <div class="form-group mb-3 col-md-6">
                    <label for="empnumber" class="col-form-label">{{ __('Employee Number') }}</label>
                    <input id="empnumber" type="text" class="form-control @error('empnumber') is-invalid @enderror" name="empnumber" value="{{ old('empnumber', $user->empnumber) }}" required readonly disabled>
                    @error('empnumber')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Employee Name --}}
                <div class="form-group mb-3 col-md-6">
                    <label for="empname" class="col-form-label">{{ __('Employee Name') }}</label>
                    <input id="empname" type="text" class="form-control @error('empname') is-invalid @enderror" name="empname" value="{{ old('empname', $user->empname) }}" required>
                    @error('empname')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="row">
                {{-- Email --}}
                <div class="form-group mb-3 col-md-6">
                    <label for="email" class="col-form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Role --}}
                <div class="form-group mb-3 col-md-6">
                    <label for="role" class="col-form-label">{{ __('Role') }}</label>
                    <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role', $user->role) }}" required>
                    @error('role')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="row">
                {{-- Password --}}
                <div class="form-group mb-3 col-md-6">
                    <label for="password" class="col-form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Leave blank if not changing">
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="form-group mb-3 col-md-6">
                    <label for="password_confirmation" class="col-form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Leave blank if not changing">
                </div>
            </div>

            <div class="row mb-4 mt-3">
                <p><strong>{{ __('Status:') }}</strong>
                    @if ($user->is_active)
                        <span class="badge bg-success">{{ __('Active') }}</span>
                    @else
                        <span class="badge bg-danger">{{ __('Inactive') }}</span>
                    @endif
                </p>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
        </form>
    </div>

    <script>
        function previewProfileImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('profileImagePreview');
                preview.innerHTML = `<img src="${reader.result}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">`;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
