<x-app-layout>

    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->job_title }}" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{$post->job_title}}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$post->location}}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$post->work_type}}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$post->salary}}EGP</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{$post->description}}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p>{{$post->responsibility}}</p>
                        <h4 class="mb-3">Qualifications</h4>
                        <p>{{$post->qualification}}</p>
                        <h4 class="mb-3">Skills</h4>

                         <ul class="flex-wrap list-unstyled d-flex  gap-2">
                            @foreach ( explode(",",$post->skills) as $skill )
                            <li class="border border-success bg-success text-white p-2">{{$skill}}</li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Portfolio Website">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp position-relative " data-wow-delay="0.1s">
                        @if ($post->status =="Published")
                        <div class="position-absolute right-0 p-2  text-white bg-green-600 top-0 z-1 opacity-75">{{$post->status}}</div>
                        @elseif ($post->status =="Pending")
                        <div class="position-absolute right-0 p-2  text-white bg-sky-600 top-0 z-1 opacity-75">{{$post->status}}</div>

                        @endif

                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Created On:<span style="font-size:14px;font-weight:bold">{{$post->created_at->format('l jS \\of F Y ') }}</span></p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Company :{{$post->comapny}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{$post->work_type}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{$post->salary}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{$post->location}}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Close Date: {{$post->closed_date}}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <p class="m-0 " >Thank you for considering an opportunity with our company. We appreciate the time and effort you have put into your application. At {{ $post->comapny }}, we value dedication, innovation, and teamwork. We believe that every individual has the potential to contribute to our success, and we are excited about the possibility of working together.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="w-50 ms-5" >
    <h4 class="mb-4">Comments</h4>

    @if ($post->comments)
    <div class=" rounded my-2">
    @foreach ( $post->comments as $comment )
    <div class="border-b p-3 d-flex flex-col gap-3 my-2">
        <div class="d-flex align-items-center gap-2  pb-2">
            <img src="default-image.jpg"
                 alt="User Profile"
                 class="rounded-full border"
                 style="height: 50px; width: 50px; object-fit: contain; object-position: center;">
            <div>
            <p>{{$post->user ? $post->user->name : "null"}}</p>
            <p class="px-2">{{$comment->body}}</p>
            </div>
        </div>


    </div>

    @endforeach
</div>
    @endif






    <div class="col-12">
        <form action="{{route("comment.store",["post"=>$post])}}" method="POST">
            @csrf
            <div class="mb-3">

                <textarea class="form-control" id="comment" name="body" rows="3" placeholder="Write your comment here..."
                    required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Your Comment</button>
        </form>

    </div>
</div>




</x-app-layout>
