<x-app-layout>
    <div class="container-xxl py-5 bg-dark page-header mb-3">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Listing</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">jobs</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl bg-white p-0">

        <div class="container-xxl py-5">
            <div class="container">
                {{-- <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1> --}}
                @if (auth()->user()->role === 'employer')
                    <a href="{{ route('post.create') }}" class="btn btn-secondary m-3">Add job post</a>
                @endif

                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <!-- Tab navigation -->
                    <ul class="nav nav-pills d-iwnline-flex justify-content-center border-bottom mb-5">
                        @foreach ($posts as $workType => $jobs)
                            <li class="nav-item">
                                <!-- Ensure that href corresponds to tab id -->
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $loop->first ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#{{ Str::slug($workType) }}">
                                    <h6 class="mt-n1 mb-0">{{ $workType }}</h6>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach ($posts as $workType => $jobs)
                            <div id="{{ Str::slug($workType) }}"
                                class="tab-pane fade {{ $loop->first ? 'show active' : '' }} p-0">
                                @foreach ($jobs as $post)
                                    <div class="job-item p-4 mb-4 border rounded shadow-sm bg-white">
                                        <div class="row g-4 align-items-center">
                                            <!-- Job Image & Details -->
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid border rounded"
                                                    src="{{ asset('storage/' . $post->image) }}" alt="Job Image"
                                                    style="width: 80px; height: 80px; object-fit: cover;">

                                                <div class="text-start ps-4">
                                                    <h5 class="mb-3 fw-bold text-dark">{{ $post->job_title }}</h5>

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
                                                            <span class="fw-semibold text-dark">Application
                                                                Deadline:</span>
                                                            <span
                                                                class="text-danger ms-2 fw-bold">{{ $post->closed_date }}</span>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>

                                            <!-- Actions Section -->
                                            <div
                                                class="col-sm-12 col-md-4 d-flex flex-column align-items-md-end  justify-content-center text-md-end">
                                                <div class="mb-3">
                                                    @if (auth()->user()->role === 'candidate')
                                                        <a class="btn btn-primary px-4 py-2  shadow-sm"
                                                            href="{{ route('post.show', $post->id) }}">Apply Now</a>
                                                    @else
                                                        <a class="btn btn-outline-primary px-4 py-2 shadow-sm"
                                                            href="{{ route('post.show', $post->id) }}">Show Details</a>
                                                    @endif
                                                </div>

                                                <div class="d-flex align-items-center justify-content-md-end mt-2">
                                                    @can('delete-post', $post)
                                                        <form action="{{ route('post.destroy', $post) }}" method="post"
                                                            class="d-flex align-items-center gap-3 ">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn btn-link text-danger me-3 p-0 d-flex align-items-center">
                                                                <i class="fa-solid fa-trash fs-6"></i>
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('post.edit', $post->id) }}"
                                                            class="d-flex align-items-center me-5">
                                                            <i class="fa-solid fa-pen-nib text-secondary fs-6"></i>
                                                        </a>
                                                    @endcan
                                                </div>


                                            </div>
                                        </div>
                                @endforeach
                                <a class="btn btn-primary py-3 px-5 shadow-sm d-block mx-auto" href="#">Browse
                                    More Jobs</a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>


</x-app-layout>
