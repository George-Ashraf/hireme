<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Applications</h1>
            <div class="container-xxl py-5">
                <div class="container">
                    <h4 class="text-center mb-4 wow fadeInUp" data-wow-delay="0.1s">Applications List</h4>
                    <div class="row g-4">
                        @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="job Image"
                                    style="width: 100%; height: 180px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <a href="{{ route('post.show', $post->id) }}">
                                        <h5 class="card-title">Job Title: {{ $post->job_title }}</h5>
                                    </a>
                                    <p class="card-text">
                                        <span class="badge rounded-pill bg-primary">
                                            <i class="fas fa-users me-1"></i>Applications:
                                            {{ $post->application ? $post->application->count() : 0 }} users apply
                                        </span>
                                    </p>
                                    <p class="card-text">
                                        <span class="badge rounded-pill bg-warning">
                                            <i class="fas fa-clock me-1"></i>Pending Applications:
                                            {{ $post->application->where('status', 'Pending')->count() }} users
                                        </span>
                                        <span class="badge rounded-pill bg-success">
                                            <i class="fas fa-check me-1"></i>Accepted Applications:
                                            {{ $post->application->where('status', 'Accepted')->count() }} users
                                        </span>
                                        <span class="badge rounded-pill bg-danger">
                                            <i class="fas fa-times me-1"></i>Rejected Applications:
                                            {{ $post->application->where('status', 'Rejected')->count() }} users
                                        </span>
                                    </p>
                                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>