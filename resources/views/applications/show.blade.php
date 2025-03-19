<x-app-layout>
    <!-- Header -->
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-light">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}" class="text-light">Jobs</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.show', $post->id) }}" class="text-light">Job
                            Post</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Application</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Job Details Card -->
    <div class="container">
        <div class="tab-content px-4">
            <div class="job-item p-4 mb-4 shadow-sm bg-white rounded-3">
                <div class="row g-4 align-items-center">
                    <div class="col-md-8 d-flex align-items-center">
                        <img class="img-fluid border rounded shadow-sm" src="{{ asset('storage/' . $post->image) }}"
                            alt="Job Image"
                            style="width: 80px; height: 80px; object-fit: cover; border: 3px solid #f1f1f1;">
                        <div class="text-start ps-4">
                            <h5 class="fw-bold text-dark mb-2">{{ $post->job_title }}</h5>
                            <div class="d-flex flex-wrap gap-3">
                                <span class="d-flex align-items-center"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i><span
                                        class="text-muted">{{ $post->location }}</span></span>
                                <span class="d-flex align-items-center"><i
                                        class="fas fa-globe text-primary me-2"></i><span
                                        class="text-muted">{{ $post->work_type }}</span></span>
                                <span class="d-flex align-items-center"><i
                                        class="far fa-money-bill-alt text-primary me-2"></i><span
                                        class="text-muted">${{ $post->salary }}</span></span>
                                <span class="d-flex align-items-center">
                                    <i class="far fa-calendar-alt text-primary me-2"></i>
                                    <span class="fw-semibold text-dark">Application Deadline:</span>
                                    <span
                                        class="text-danger ms-2">{{ \Carbon\Carbon::parse($post->closed_date)->format('F j, Y') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Application Details -->
                <div class="mt-4">
                    <h6 class="fw-bold text-dark">Application Details</h6>
                    <p class="text-muted small"><strong>Submitted At:</strong>
                        {{ $application->created_at->format('F d, Y h:i A') }}
                    </p>
                    <p class="text-muted small"><strong>Last Updated At:</strong>
                        {{ $application->updated_at->format('F d, Y h:i A') }}
                    </p>
                    <p class="d-flex align-items-center">
                        <strong class="me-2">Status:</strong>
                        <span
                            class="badge rounded-pill bg-{{ $application->status === 'Accepted' ? 'success' : ($application->status === 'Rejected' ? 'danger' : 'warning') }} px-3 py-2">
                            <i
                                class="fas fa-{{ $application->status === 'Accepted' ? 'check' : ($application->status === 'Rejected' ? 'times' : 'clock') }} me-1"></i>
                            {{ $application->status }}
                        </span>
                    </p>

                    @if (auth()->user()->role === 'candidate')
                        <div class="d-flex gap-2 ">
                            <a href="{{ route('application.edit', $application->id) }}"
                                class="btn btn-secondary px-4 ">Update Resume</a>
                            <form action="{{ route('application.destroy', $application) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="fw-lighter  btn btn-primary  px-4 ">Withdraw
                                    Application </button>
                            </form>

                        </div>
                    @elseif(auth()->user()->role === 'employer')
                        <!-- Employer's Application Review Section -->
                        <div class="mt-4 card p-4 shadow-sm border-0 rounded-3 bg-light">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/' . $application->user->image) }}"
                                    class="img-fluid rounded-circle me-3 shadow-sm"
                                    alt="{{ $application->user->name }}"
                                    style="width: 80px; height: 80px; object-fit: cover; border: 3px solid #fff;">
                                <div class="col">
                                    <h5 class="fw-bold text-dark mb-1">{{ $application->user->name }}</h5>
                                    <div class="small text-muted">
                                        <i class="bi bi-telephone me-2"></i>{{ $application->user->phone }}<br>
                                        <i class="bi bi-envelope me-2"></i>{{ $application->user->email }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <a href="{{ asset('storage/' . $application->user->resume) }}"
                                    class="btn btn-primary btn-sm w-100 d-flex align-items-center justify-content-center shadow-sm"
                                    target="_blank" style="border-radius: 8px;">
                                    <i class="fas fa-file-alt me-2"></i> View Resume
                                </a>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <form action="{{ route('application.status', $application) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Accepted">
                                        <button type="submit" class="btn btn-success btn-sm w-100 shadow-sm"
                                            style="border-radius: 8px;"
                                            @if ($application->status === 'Accepted') disabled @endif>
                                            <i class="fas fa-check me-1"></i> Accept
                                        </button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('application.status', $application) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Rejected">
                                        <button type="submit" class="btn btn-danger btn-sm w-100 shadow-sm"
                                            style="border-radius: 8px;"
                                            @if ($application->status === 'Rejected') disabled @endif>
                                            <i class="fas fa-times me-1"></i> Reject
                                        </button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <form action="{{ route('application.status', $application) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="status" value="Pending">
                                        <button type="submit" class="btn btn-secondary btn-sm w-100 shadow-sm"
                                            style="border-radius: 8px;"
                                            @if ($application->status === 'Pending') disabled @endif>
                                            <i class="fas fa-clock me-1"></i> Pending
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
