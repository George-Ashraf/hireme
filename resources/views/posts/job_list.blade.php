<div class="tab-content">
    @foreach ($posts as $workType => $jobs)
        <div id="{{ Str::slug($workType) }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }} p-0">
            @foreach ($jobs as $post)
                <div class="job-item p-4 mb-4 border shadow-sm bg-white position-relative">
                    <div class="row align-items-center p-4 ">
                        <!-- Job Image & Details -->
                        <div class="col-md-9 d-flex align-items-center gap-3">
                            <img class="img-fluid border rounded" src="{{ asset('storage/' . $post->image) }}"
                                alt="Job Image" style="width: 80px; height: 80px; object-fit: cover;">
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
                                        <span
                                            class="text-danger ms-1 fw-bold">{{ \Carbon\Carbon::parse($post->closed_date)->format('F j, Y') }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Actions Section -->
                        <div class="col-md-3 text-md-end   mt-3  ">
                            @if (auth()->user() && auth()->user()->role === 'candidate')
                                @if ($post->closed_date < now())
                                    <div class="position-absolute top-0 rounded-sm bg-danger text-white p-2 end-0">
                                        Closed
                                    </div>
                                    <a class="btn  px-4 py-2 shadow-sm fw-semibold"
                                        href="{{ route('post.show', $post->id) }}">Show Details</a>
                                @else
                                    <a class="btn btn-primary px-4 py-2 shadow-sm fw-semibold"
                                        href="{{ route('post.show', $post->id) }}">Apply Now</a>
                                @endif
                            @else
                                <a class="btn btn-outline-primary px-4 py-2 shadow-sm fw-semibold"
                                    href="{{ route('post.show', $post->id) }}">Show Details</a>
                            @endif

                            @can('delete-post', $post)
                                <div class="dropdown d-inline ">
                                    <button class="btn btn-outline-primary   p-2 dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('post.edit', $post->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('post.destroy', $post) }}" method="post">
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
            <a class="btn btn-primary p-3 shadow-sm fw-semibold col-md-4 col-sm-12" href="{{ route('post.index') }}">
                <i class="fas fa-search me-1"></i> Browse More Jobs
            </a>
        </div>
    @endforeach
</div>
