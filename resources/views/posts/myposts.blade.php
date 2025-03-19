<x-app-layout>
    <div class="tab-content mt-4">
        <div class="tab-pane fade show active p-0">
            @foreach ($myposts as $post)
            <div class="job-item p-4 mb-4 border shadow-sm bg-white" style="border-radius: 10px;">
                <div class="row align-items-center p-4">
                    <!-- Job Image & Details -->
                    <div class="col-md-9 d-flex align-items-center gap-3">
                        <img class="img-fluid border rounded" src="{{ asset('storage/' . $post->image) }}"
                            alt="Job Image" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <h5 class="fw-bold text-dark mb-2 text-start fs-4">{{ $post->job_title }}</h5>

                            @if ($post->status == 'Pending')
                            <div class="alert alert-warning text-center py-1 mb-2">
                                <p class="mb-0">Waiting for admin approval</p>
                            </div>
                            @else
                            <div class="alert alert-success text-center py-1 mb-2">
                                <p class="mb-0">Post approved by admin</p>
                            </div>
                            @endif

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
                        </div>
                    </div>

                    <!-- Actions Section -->
                    <div class="col-md-3 text-md-end mt-3">
                        <a class="btn btn-primary px-4 py-2 shadow-sm fw-semibold"
                            href="{{ route('post.show', $post->id) }}">Show Details</a>

                        @can('delete-post', $post)
                        <div class="dropdown d-inline ms-2">
                            <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                ⋮
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('post.edit', $post->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>