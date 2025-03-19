<x-app-layout>
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Pending Posts</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Pending Posts</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        @foreach ($pendingposts as $post)
        <div class="job-item p-4 mb-4 border rounded shadow-sm bg-white">
            <div class="row g-4">
                <div class="col-md-8 d-flex align-items-center gap-3">
                    <img class="img-fluid border rounded" src="{{ asset('storage/' . $post->image) }}" alt="Job Image"
                        style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="flex-grow-1">
                        <a href="{{ route('post.show', $post->id) }}" class="text-decoration-none">
                            <h5 class="fw-bold text-dark mb-2 text-start fs-4">{{ $post->job_title }}</h5>
                        </a>
                        <div class="d-flex flex-wrap gap-3 text-muted small">
                            <span class="d-flex align-items-center">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $post->location }}
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="fa-solid fa-globe text-primary me-2"></i>{{ $post->work_type }}
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="far fa-money-bill-alt text-primary me-2"></i>${{ $post->salary }}
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="far fa-calendar-alt text-primary me-2"></i>
                                <span class="fw-semibold text-dark">Deadline:</span>
                                <span class="text-danger ms-1 fw-bold">
                                    {{ \Carbon\Carbon::parse($post->closed_date)->format('F j, Y') }}
                                </span>
                            </span>
                        </div>
                        <div class="mt-2">
                            <span
                                class="badge rounded-pill bg-{{ $post->status === 'Pending' ? 'warning' : 'success' }}">
                                <i
                                    class="fas fa-{{ $post->status === 'Pending' ? 'hourglass-half' : 'check' }} me-1"></i>
                                {{ $post->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-md-end">
                    <div class="d-flex flex-column align-items-end gap-2">
                        @can('delete-post', $post)
                        <div class="d-flex gap-2 mb-2">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-pen-nib me-1"></i>Edit
                            </a>
                            <form action="{{ route('post.destroy', $post) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                    <i class="fa-solid fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                        @endcan

                        <div class="d-flex gap-2">
                            @if ($post->status == 'Pending')
                            <a class="btn btn-success" href="{{ route('posts.status', $post->id) }}">
                                <i class="fas fa-check me-1"></i>Accept
                            </a>
                            @else
                            <a class="btn btn-warning" href="{{ route('posts.status', $post->id) }}">
                                <i class="fas fa-undo me-1"></i>Pull Post
                            </a>
                            @endif

                            <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">
                                <i class="fas fa-eye me-1"></i>Show Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>