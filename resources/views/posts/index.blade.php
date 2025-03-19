<x-app-layout>
    <div class="container-xxl py-5 bg-dark page-header mb-3">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Listing</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Jobs</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5">
            <div class="container">
                @if (auth()->user() && auth()->user()->role === 'employer')
                <a href="{{ route('post.create') }}" class="btn btn-secondary mb-4">Add Job Post</a>
                @endif

                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>

                <div class="searchBox mx-auto my-4">
                    <form action="{{ route('post.search') }}" method="GET">
                        <input class="searchInput " type="text" name="search" placeholder="Search something"
                            value="{{ request()->query('search', '') }}">
                        <button class="searchButton">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <!-- Tab navigation -->
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        @foreach ($posts as $workType => $jobs)
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $loop->first ? 'active' : '' }}"
                                data-bs-toggle="pill" href="#{{ Str::slug($workType) }}">
                                <h6 class="mt-n1 mb-0">{{ $workType }}</h6>
                            </a>
                        </li>
                        @endforeach
                    </ul>


                    @include('posts.job_list', ['posts' => $posts])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>