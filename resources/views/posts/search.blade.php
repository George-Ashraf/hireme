<x-app-layout>
    <div class="container-xxl bg-white p-5">
        <div class="searchBox mx-auto my-5">
            <form action="{{ route('post.search') }}" method="GET">
                <input class="searchInput" type="text" name="search" placeholder="Search something"
                    value="{{ request('search') }}">
                <button class="searchButton">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        @if (!empty($name))
        @if ($search_post->isEmpty())
        <div class="alert alert-danger text-center mt-5">
            <h5> No jobs found for "{{ $name }}".</h5>
        </div>
        @else
        @foreach ($search_post as $post)
        <div class="job-item p-4 mb-4">
            <div class="row g-4">
                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                    <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/' . $post->image) }}"
                        alt="" style="width: 80px; height: 80px;">
                    <div class="text-start ps-4">
                        <h5 class="mb-3">{{ $post->job_title }}</h5>
                        <span class="text-truncate me-3"><i
                                class="fa fa-map-marker-alt text-primary me-2"></i>{{ $post->location }}</span>
                        <span class="text-truncate me-3"> <i class="fa-solid fa-globe text-primary me-2">
                            </i>{{ $post->work_type }}</span>
                        <span class=" text-truncate me-0"><i
                                class="far fa-money-bill-alt text-primary me-2"></i>${{ $post->salary }}</span>
                    </div>
                </div>
                <div
                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                    @can('delete-post', $post)
                    @auth
                    <a href="{{ route('post.destroy', $post->id) }}"><i class="fa-solid fa-trash text-danger"></i></a>
                    <a href="{{ route('post.edit', $post->id) }}"><i class="fa-solid fa-pen-nib text-secondary"></i></a>
                    @endauth
                    @endcan
                    <div class="d-flex mb-3">
                        @auth
                        @if (auth()->user()->role === 'candidate')
                        <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">Apply
                            Now</a>
                        @else
                        <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">Show
                            Details</a>
                        @endif
                        @else
                        <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">Show
                            Details</a>
                        @endauth

                    </div>
                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date
                        Line: {{ $post->closed_date }}</small>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        @endif
    </div>
</x-app-layout>