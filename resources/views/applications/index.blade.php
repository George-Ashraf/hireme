<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Applications</h1>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-4">
                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="card p-2" style="width: 19rem;">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                        alt="job Image" style="width: 100%; height: 180px; object-fit: contain;">
                                    <div class="card-body text-center">
                                        <a href="{{ route('post.show', $post->id) }}">
                                            <h5 class="card-title fs-5" style="min-height:40px">{{ $post->job_title }}
                                            </h5>
                                        </a>
                                        <p class="card-text fs-5">
                                            <span class="badge rounded-pill bg-secondary">
                                                <i class="fas fa-users me-1"></i>Applications:
                                                {{ $post->application ? $post->application->count() : 0 }} users apply
                                            </span>
                                        </p>
                                        <p class="card-text fs-5 ">
                                            <span class="badge text-warning">
                                                <i class="fas fa-clock me-1"></i>Pending :
                                                {{ $post->application->where('status', 'Pending')->count() }} users
                                            </span>
                                            <span class="badge text-success">
                                                <i class="fas fa-check me-1"></i>Accepted :
                                                {{ $post->application->where('status', 'Accepted')->count() }} users
                                            </span>
                                            <span class="badge  text-danger">
                                                <i class="fas fa-times me-1"></i>Rejected :
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
