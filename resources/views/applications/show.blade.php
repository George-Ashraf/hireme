<x-app-layout>
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Jobs</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.show', $post->id) }}">Job Post</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Application</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <!-- Added container wrapper -->
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
                                    <i class="fas fa-globe text-primary me-2"></i>
                                    <span class=" text-muted">{{ $post->work_type }}</span>
                                </span>

                                <span class="d-flex align-items-center">
                                    <i class="far fa-money-bill-alt text-primary me-2"></i>
                                    <span class="text-muted">${{ $post->salary }}</span>
                                </span>

                                <span class="d-flex align-items-center">
                                    <i class="far fa-calendar-alt text-primary me-2 fs-5"></i>
                                    <span class="fw-semibold text-dark">Application Deadline:</span>
                                    <span
                                        class="text-danger ms-2 fw-bold">{{ \Carbon\Carbon::parse($post->closed_date)->format('F j, Y') }}</span>
                                </span>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Application Details -->
                <div class="mt-4">
                    <h5 class="fw-bold text-dark">Application Details</h5>
                    <p><strong>Submitted At:</strong> {{ $application->created_at->format('F d, Y h:i A') }}</p>
                    <p><strong>Last Updated At:</strong> {{ $application->updated_at->format('F d, Y h:i A') }}</p>
                    <p class="d-flex align-items-center">
                        <strong class="me-2">Status:</strong>
                        <span
                            class="badge rounded-pill bg-{{ $application->status === 'Accepted' ? 'success' : ($application->status === 'Rejected' ? 'danger' : 'warning') }}">
                            <i
                                class="fas fa-{{ $application->status === 'Accepted' ? 'check' : ($application->status === 'Rejected' ? 'times' : 'clock') }} me-1"></i>
                            {{ $application->status }}
                        </span>
                    </p>

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
                    @elseif(auth()->user()->role === 'employer')
                    <!-- Applicant Profile -->
                    <div class="mt-4">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $application->user->image) }}"
                                class="img-fluid rounded-circle me-3" alt="{{ $application->user->name }}"
                                style="width: 80px; height: 80px; object-fit: cover;">
                            <div class="col">
                                <h5 class="fw-bold m-2">{{ $application->user->name }}</h5>
                                <div>
                                    <span class="text-muted m-1"><i
                                            class="bi bi-telephone m-2"></i>{{ $application->user->phone }}</span>
                                    <span class="text-muted m-1"><i
                                            class="bi bi-envelope m-2"></i>{{ $application->user->email }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-3">
                            <a href="{{ asset('storage/' . $application->user->resume) }}"
                                class="btn btn-primary btn-sm w-100 mb-2" target="_blank">
                                <i class="fas fa-file-alt me-2"></i>View Resume
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-2">
                                <form action="{{ route('application.status', $application) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="Accepted">
                                    <button type="submit" class="btn btn-success btn-sm w-100" @if($application->status
                                        === 'Accepted') disabled @endif>
                                        <i class="fas fa-check me-2"></i>Accept
                                    </button>
                                </form>
                            </div>

                            <div class="col-4 mb-2">
                                <form action="{{ route('application.status', $application) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="Rejected">
                                    <button type="submit" class="btn btn-danger btn-sm w-100" @if($application->status
                                        === 'Rejected') disabled @endif>
                                        <i class="fas fa-times me-2"></i>Reject
                                    </button>
                                </form>
                            </div>

                            <div class="col-4 mb-2">
                                <form action="{{ route('application.status', $application) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="status" value="Pending">
                                    <button type="submit" class="btn btn-secondary btn-sm w-100"
                                        @if($application->status === 'Pending') disabled @endif>
                                        <i class="fas fa-clock me-2"></i>Pending
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>