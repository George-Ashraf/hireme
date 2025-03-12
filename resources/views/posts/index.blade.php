<x-app-layout>

<div class="container-xxl bg-white p-0">

    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            @auth
            <a href="{{ route('post.create') }}" class="btn btn-secondary m-5">Add job post</a>
            @endauth
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <!-- Tab navigation -->
                <ul class="nav nav-pills d-iwnline-flex justify-content-center border-bottom mb-5">
                    @foreach ($posts as $workType => $jobs)
                   <li class="nav-item">
                        <!-- Ensure that href corresponds to tab id -->
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{$loop->first ? 'active' : ''}}" data-bs-toggle="pill" href="#{{ Str::slug($workType) }}">
                            <h6 class="mt-n1 mb-0">{{ $workType }}</h6>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <!-- Tab content -->
                <div class="tab-content">
                    @foreach ($posts as $workType => $jobs)
                    <div id="{{ Str::slug($workType) }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }} p-0">
                            @foreach ($jobs as $job)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $job->image )}}" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{ $job->job_title }}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->work_type }}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="{{ route('post.show', $job->id)}}">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $job->closed_date }}</small>
                                    </div>

                                </div>
                                @auth <a
                                href="{{ route('post.destroy',$job->id) }}"> <i
                                    class="fa-solid fa-trash text-danger"></i></a> <a
                                href="{{ route('post.edit',$job->id) }}"> <i
                                    class="fa-solid fa-pen-nib text-secondary"></i></a>
                                     @endauth</h6>
                            </div>
                            @endforeach

                        <a class="btn btn-primary py-3 px-5" href="#">Browse More Jobs</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
