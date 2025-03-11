<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Job Listings</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/css/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Job Listing Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <!-- Tab navigation -->
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
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
                            @if(count($jobs) > 0)
                                @foreach ($jobs as $job)
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('assets/img/com-logo-1.jpg')}}" alt="" style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $job->job_title }}</h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{ $job->skills }}</span>
                                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary }}</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                                <a class="btn btn-primary" href="#">Apply Now</a>
                                            </div>
                                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: {{ $job->closed_date }}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p>No jobs available for {{ $workType }}.</p>
                            @endif
                            <a class="btn btn-primary py-3 px-5" href="#">Browse More Jobs</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Listing End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/js/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
