{{-- Navbar --}}
<nav class="navbar navbar-expand-md navbar-orange bg-orange shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-white">{{ __('News') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white">{{ __('Appointment') }}</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{-- Display the user's image --}}
                            @if (Auth::user()->emp_image)
                                <img src="{{ asset('storage/' . Auth::user()->emp_image) }}" alt="Profile Image" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                            @else
                                {{-- Placeholder image if no profile image exists --}}
                                <img src="{{ asset('images/default-profile.jpg') }}" alt="Default Profile" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            {{-- Profile link --}}
                            <a class="dropdown-item" href="{{ route('profile.show', Auth::user()->id) }}">
                                {{ __('Profile') }}
                            </a>

                            {{-- Divider --}}
                            <div class="dropdown-divider"></div>

                            {{-- Logout link --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            {{-- Logout form --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
