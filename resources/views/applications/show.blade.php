<x-app-layout>
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">jobs</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.show', $post->id) }}">Job Post</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Application</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="tab-content px-4">
        <div class="job-item p-4 mb-4 border rounded shadow-sm bg-white">
            <div class="row g-4 align-items-center">
                <!-- Job Image & Details -->
                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                    <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/' . $post->image) }}"
                        alt="Job Image" style="width: 80px; height: 80px; object-fit: cover;">

                    <div class="text-start ps-4">
                        <a class="mb-3 fw-bold text-dark"
                            href="{{ route('post.show', $post->id) }}">{{ $post->job_title }}</a>

                        <div class="d-flex flex-wrap gap-3">
                            <span class="d-flex align-items-center">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                <span class="text-muted">{{ $post->location }}</span>
                            </span>

                            <span class="d-flex align-items-center">
                                <i class="far fa-clock text-primary me-2"></i>
                                <span class="text-muted">{{ $post->work_type }}</span>
                            </span>

                            <span class="d-flex align-items-center">
                                <i class="far fa-money-bill-alt text-primary me-2"></i>
                                <span class="text-muted">${{ $post->salary }}</span>
                            </span>

                            <span class="d-flex align-items-center">
                                <i class="far fa-calendar-alt text-primary me-2 fs-5"></i>
                                <span class="fw-semibold text-dark">Application Deadline:</span>
                                <span class="text-danger ms-2 fw-bold">{{ $post->closed_date }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary p-2 shadow-sm d-block mx-auto mt-4 col-2" href="#">Browse More
                    Jobs</a>

            </div>

            <!-- Application Details -->
            <div class="mt-4">
                <h5 class="fw-bold text-dark">Application Details</h5>
                <p><strong>Submitted At:</strong> {{ $application->created_at }}</p>
                <p><strong>Last Updated At:</strong> {{ $application->updated_at }}</p>

                <p><strong>Status:</strong> {{ $application->status }}</p>
                @if (auth()->user()->role === 'candidate')
                    <div class="d-flex gap-3">
                        <!-- Withdraw Application -->
                        <form action="{{ route('application.destroy', $application) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Withdraw Application</button>
                        </form>

                        <!-- Update Resume -->
                        <a href="{{ route('application.edit', $application->id) }}" class="btn btn-secondary">Update
                            Resume</a>
                    </div>
                    {{-- @elseif () --}}
                @endif

            </div>


        </div>
    </div>
</x-app-layout>
