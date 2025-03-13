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
            @can('candidate-only')
            <a href="{{ route('post.index') }}" class="nav-item nav-link">Jobs</a>

            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  jobs
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('post.index') }}">All jobs</a></li>
                    <li><a class="dropdown-item" href="{{ route('post.create') }}">create job</a></li>

                  </ul>


              </li>
            @endcan


        </div>
        <a href="contact.html" class="nav-item nav-link">Contact</a>
    </div>

    <div class="d-flex align-items-center justify-content-end py-4 px-lg-5">
        @if (Route::has('login'))
            <nav class="d-flex">
                @auth
                    {{-- <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="btn btn-light dropdown-toggle">
                                {{ Auth::user()->name }}
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                        </x-slot>
                    </x-dropdown> --}}
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">profile</a></li>
                            @if (auth()->user()->role == 'admin')
                                <li>
                                    <a class="dropdown-item" href="{{ route('pending.index') }}">pending posts </a>

                                </li>
                            @elseif (auth()->user()->role == 'employer')
                                <li>
                                    <a class="dropdown-item" href="{{ route('myposts.index') }}">my posts </a>

                                </li>
                            @endif

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        href="{{ route('logout') }}">log out</a>
                                </form>

                            </li>

                        </ul>
                    </div>
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
