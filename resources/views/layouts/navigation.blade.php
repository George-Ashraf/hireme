<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">Hire<span style="color:rgb(29, 100, 253) ">Me</span></h1>
    </a>
    <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
            <a href="{{ route('home') }}" class="nav-item nav-link">About</a>
            <a href="{{ route('post.index') }}" class="nav-item nav-link">Jobs</a>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
        </div>

        <div class="d-flex align-items-center justify-content-end py-4 px-lg-5">
            @if (Route::has('login'))
            <nav class="d-flex">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="btn btn-light dropdown-toggle">
                            {{ Auth::user()->name }}
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <a href="{{ route('login') }}" class="  me-5  ">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="  ">Register</a>
                @endif
                @endauth
            </nav>
            @endif
        </div>
    </div>
</nav>
