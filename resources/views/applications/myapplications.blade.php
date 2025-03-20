<x-app-layout>
    <div class="container-xxl py-2 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">You All Aplliction</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">jobs</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Your Applications</li>
                </ol>
            </nav>
        </div>
    </div>
    @auth
        <div class="tab-content mt-4 px-4">
            <div class="tab-pane fade show active p-0    mx-auto col-10">
                <h2 class="text-center my-4"> Applied Jobs</h2>
                <p class="text-center text-body-secondary w-50 mx-auto" style="font-size:16px; ">Here you can find all the
                    jobs you have
                    applied for. Stay updated on your application
                    status and new opportunities.</p>
                @forelse ($applications as $application)
                    <div class="job-item p-4 mb-4 border  bg-white">
                        <div class="row align-items-center p-4">
                            <!-- Job Image & Details -->
                            <div class="col-md-9 d-flex align-items-center gap-3">
                                <img class="img-fluid border rounded"
                                    src="{{ asset('storage/' . $application->post->image) }}" alt="Job Image"
                                    style="width: 80px; height: 80px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <a class="fw-bold text-dark mb-2 text-start fs-4"
                                        href="{{ route('post.show', $application->post->id) }}">
                                        {{ $application->post->job_title }}
                                    </a>
                                    <div class="d-flex flex-wrap gap-3 text-muted small">
                                        <span class="d-flex align-items-center">
                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                            {{ $application->post->location }}
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <i class="fa-solid fa-globe text-primary me-2"></i>
                                            {{ $application->post->work_type }}
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <i class="far fa-money-bill-alt text-primary me-2"></i>
                                            ${{ $application->post->salary }}
                                        </span>
                                        <span class="d-flex align-items-center">
                                            <i class="far fa-calendar-alt text-primary me-2"></i>
                                            <span class="fw-semibold text-dark">Applied At:</span>
                                            <span class="text-danger ms-1 fw-bold">
                                                {{ \Carbon\Carbon::parse($application->created_at)->format('F j, Y') }}
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions Section -->
                            <div class="col-md-3 text-md-end mt-3">
                                <a class="btn btn-primary px-4 py-2 shadow-sm fw-semibold"
                                    href="{{ route('application.show', $application->id) }}">Show Details</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info text-center">
                        You haven't applied to any jobs yet.

                    </div>
                    <a class="btn btn-primary p-3 shadow-sm fw-semibold d-block  mx-auto col-md-4 col-sm-12"
                        href="{{ route('post.index') }}">
                        <i class="fas fa-search me-1"></i> Browse More Jobs
                    </a>
                @endforelse
            </div>
        </div>
    @endauth
</x-app-layout>
