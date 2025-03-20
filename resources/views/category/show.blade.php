<x-app-layout>
    <div class="container-xxl bg-white p-0">
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>

                <div class="searchBox mx-auto my-4">
                    <form action="{{ route('post.search') }}" method="GET">
                        <input class="searchInput" type="text" name="search" placeholder="Search something"
                            value="{{ request()->query('search', '') }}">
                        <button class="searchButton">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                @if (auth()->user()->role === 'employer')
                <a href="{{ route('post.create') }}" class="btn btn-secondary m-5">Add job post</a>
                @endif

                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <!-- Tab navigation -->
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        @foreach ($posts as $workType => $jobs)
                        <li class="nav-item">
                            <!-- Ensure that href corresponds to tab id -->
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $loop->first ? 'active' : '' }}"
                                data-bs-toggle="pill" href="#{{ Str::slug($workType) }}">
                                <h6 class="mt-n1 mb-0">{{ $workType }}</h6>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Tab content -->
                    @include('posts.job_list', ['posts' => $posts])

                </div>
            </div>
        </div>
    </div>
</x-app-layout>