<x-app-layout>
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/job.webp" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Perfect Job That
                                    You Deserved</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                    dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                    rebum sea elitr.</p>
                                <a href=""
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A
                                    Job</a>
                                <a href="{{ route('post.create') }}"
                                    class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A
                                    Talent</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/hir.webp" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(43, 57, 64, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown mb-4">Find The Best Startup Job
                                    That Fit You</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum
                                    dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd
                                    rebum sea elitr.</p>
                                <a href=""
                                    class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A
                                    Job</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A
                                    Talent</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->



    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>

            @can('admin-only')
                @auth
                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">add category</a>

                @endauth
            @endcan

            <div class="row g-4">
                @forelse ($categories as $category)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">


                        <div class="cat-item rounded p-4">
                            <i class=" text-primary mb-4 fa fa-3x {{ $category->icon }}"></i>

                            <h6 class="mb-3">
                                <a href="{{ route('category.show', $category->id) }}"> {{ $category->name }}</a>
                                @auth

                                    @can('admin-only')
                                        <a href="{{ route('category.delete', $category->id) }}"> <i
                                                class="fa-solid fa-trash text-danger"></i></a>
                                        <a href="{{ route('category.edit', $category->id) }}"> <i
                                                class="fa-solid fa-pen-nib text-secondary"></i></a>
                                    @endcan
                                @endauth
                            </h6>


                            <p class="mb-0">{{ $category->posts_count }} Vacancy</p>
                        </div>
                    </div>
                    </a>

                @empty
                    <div class="alert alert-danger text-center">
                        <p>no category</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
    <!-- Category End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-6 text-start">
                            <img class="img-fluid w-100" src="img/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid" src="img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid" src="img/about-3.jpg" style="width: 85%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid w-100" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                        diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna
                        dolore erat amet</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Jobs Start -->
    <div class="container-xxl bg-white p-0">




        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>

                <div class="searchBox mx-auto my-4">
                    <form action="{{ route('post.search') }}" method="GET">
                        <input class="searchInput" type="text" name="search" placeholder="Search something"
                            value="{{ request()->query('search', '') }}">
                        <button class="searchButton">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>



                </div>
                @auth
                    @if (auth()->user()->role === 'employer')
                        <a href="{{ route('post.create') }}" class="btn btn-secondary m-5">Add job post</a>
                    @endif
                @endauth


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

                    <!-- Tab content -->

                    <div class="tab-content">
                        @forelse ($posts as $workType => $jobs)


                            <div id="{{ Str::slug($workType) }}"
                                class="tab-pane fade {{ $loop->first ? 'show active' : '' }} p-0">
                                @foreach ($jobs as $post)
                                    <div class="job-item p-4 mb-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid border rounded"
                                                    src="{{ asset('storage/' . $post->image) }}" alt=""
                                                    style="width: 80px; height: 80px;">
                                                <div class="text-start ps-4">
                                                    <h5 class="mb-3">{{ $post->job_title }}</h5>
                                                    <span class="text-truncate me-3"><i
                                                            class="fa fa-map-marker-alt text-primary me-2"></i>{{ $post->location }}</span>
                                                    <span class="text-truncate me-3"><i
                                                            class="far fa-clock text-primary me-2"></i>{{ $post->work_type }}</span>
                                                    <span class="text-truncate me-0"><i
                                                            class="far fa-money-bill-alt text-primary me-2"></i>${{ $post->salary }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                <h6> @can('delete-post', $post)
                                                        @auth <a href="{{ route('post.destroy', $post->id) }}"> <i
                                                                    class="fa-solid fa-trash text-danger"></i></a> <a
                                                                href="{{ route('post.edit', $post->id) }}"> <i
                                                                    class="fa-solid fa-pen-nib text-secondary"></i></a>
                                                        @endauth
                                                    @endcanany
                                                </h6>
                                                <div class="d-flex mb-3">
                                                    @auth
                                                        @if (auth()->user()->role === 'candidate')
                                                            <a class="btn btn-primary"
                                                                href="{{ route('post.show', $post->id) }}">Apply
                                                                Now</a>
                                                        @else
                                                            <a class="btn btn-primary"
                                                                href="{{ route('post.show', $post->id) }}">Show
                                                                details</a>
                                                        @endif
                                                    @endauth

                                                </div>
                                                <small class="text-truncate"><i
                                                        class="far fa-calendar-alt text-primary me-2"></i>Date Line:
                                                    {{ $post->closed_date }}</small>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                <a class="btn btn-primary py-3 px-5" href="#">Browse More jobs</a>
                            </div>


                        @empty
                            <div class="alert alert-danger text-center">
                                <p>no jobs now</p>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Jobs End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="text-center mb-5">Our Clients Say!!!</h1>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                        diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                        diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                        diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                        diam</p>
                    <div class="d-flex align-items-center">
                        >>>>>>> origin/george
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1">Client Name</h5>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


</x-app-layout>
