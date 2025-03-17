<x-app-layout>
    <div class="position-fixed bottom-0 end-0 p-5" style="z-index: 1050">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">jobs</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                {{-- Job Info --}}
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->job_title }}" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $post->job_title }}</h3>
                            <span class="text-truncate me-3"><i
                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $post->location }}</span>
                            <span class="text-truncate me-3"><i
                                    class="far fa-clock text-primary me-2"></i>{{ $post->work_type }}</span>
                            <span class="text-truncate me-0"><i
                                    class="far fa-money-bill-alt text-primary me-2"></i>{{ $post->salary }}EGP</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h4 class="mb-3">Job description</h4>
                        <p>{{ $post->description }}</p>
                        <h4 class="mb-3">Responsibility</h4>
                        <p>{{ $post->responsibility }}</p>
                        <h4 class="mb-3">Qualifications</h4>
                        <p>{{ $post->qualification }}</p>
                        <h4 class="mb-3">Skills</h4>

                        <ul class="flex-wrap list-unstyled d-flex  gap-2">
                            @foreach (explode(',', $post->skills) as $skill)
                                <li class="border border-success bg-success text-white p-2">{{ $skill }}</li>
                            @endforeach

                        </ul>
                    </div>

                    {{-- Application  --}}
                    @if (auth()->user() && auth()->user()->id != $post->user_id && auth()->user()->role == 'candidate')
                        {{-- User Show Button --}}
                        @if ($post->application()->where('user_id', auth()->id())->exists())
                            <div class="col-3 mt-5">
                                <a class="btn btn-secondary w-100"
                                    href="{{ route('application.show',$post->application()->where('user_id', auth()->id())->first()->id) }}"
                                    style="font-size:14px"> Show Your Application</a>
                            </div>
                        @else
                            <form action="{{ route('application.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $post->id }}" />
                                <div class="col-3 mt-5">
                                    <button class="btn btn-success w-100" type="submit">Apply Now >></button>
                                </div>
                            </form>
                        @endif




                        {{-- Employer Application --}}
                    @elseif (auth()->user() && auth()->user()->id === $post->user_id && auth()->user()->role === 'employer')
                        <hr class="mt-5">
                        <h4 class="text-center mb-4 mt-5 wow fadeInUp" data-wow-delay="0.1s">Applications List</h4>

                        <table class="table table-bordered table-hover shadow-sm mt-5">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>Profile pic</th>
                                    <th>Candidate</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($post->application as $application)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/' . $application->user->image) }}"
                                                alt="User Image" class="rounded-circle" width="40" height="40">
                                        </td>
                                        <td>{{ $application->user->name }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $application->status == 'Approved' ? 'bg-success' : 'bg-danger' }}">
                                                {{ $application->status }}
                                            </span>

                                        </td>
                                        <td>
                                            <a href="{{ route('application.show', $application->id) }}"
                                                class="btn btn-sm btn-dark">Show</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert-danger alert mt-3">No applications</div>
                                @endforelse
                            </tbody>
                        </table>
                    @elseif (!auth()->user())
                        <form action="{{ route('application.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $post->id }}" />
                            <div class="col-3 mt-5">
                                <button class="btn btn-success w-100" type="submit">Apply Now >></button>
                            </div>
                        </form>
                    @endif
                </div>



                {{-- Job Summary --}}
                <div class="col-lg-4 border-b-2">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp position-relative " data-wow-delay="0.1s">
                        @if ($post->status == 'Published')
                            <div
                                class="position-absolute  top-0 end-0 border border-success bg-success text-white p-2  z-1 opacity-75">
                                {{ $post->status }}</div>
                        @elseif ($post->status == 'Pending')
                            <div class="position-absolute   top-0 end-0   text-white p-2  z-1 opacity-75 bg-secondary">
                                {{ $post->status }}</div>
                        @endif

                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Created On:<span
                                style="font-size:14px;font-weight:bold">{{ $post->created_at->format('l jS \\of F Y ') }}</span>
                        </p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Company :{{ $post->user->company }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $post->work_type }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $post->salary }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $post->location }}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Close Date:
                            {{ $post->closed_date }}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <p class="m-0 ">Thank you for considering an opportunity with our company. We appreciate the
                            time and effort you have put into your application. At {{ $post->user->company }}, we value
                            dedication, innovation, and teamwork. We believe that every individual has the potential to
                            contribute to our success, and we are excited about the possibility of working together.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Commments --}}
    @if ($post->status == 'Published')
        <div class="container wow slideInUp position-relative ">
            <h4 class="mb-4">Comments</h4>

            @if ($post->comments)
                <div class=" rounded my-2 col-8">
                    @foreach ($post->comments as $comment)
                        <div class="border-b p-2 my-2 bg-white rounded-lg">
                            <div class="d-flex align-items-center gap-3  pb-2 position-relative">


                                <img src="{{ asset('storage/' . $comment->user->image) }}" alt="User Profile"
                                    class="rounded-circle border"
                                    style="height: 50px; width: 50px; object-fit: contain; object-position: center;">

                                <div>
                                    <p class="mb-0">{{ $comment->user ? $comment->user->name : 'null' }}</p>
                                    <p class="text-dark my-0 py-0" style="font-size:10px">
                                        {{ $comment->user ? $comment->user->role : 'null' }}</p>

                                </div>
                                @can('update-comment', $comment)
                                    <div class="position-absolute end-0">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                                                style="font-size:12px;">
                                                ⋮
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="dropdownMenuButton" style="font-size:12px;">
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('comment.edit', ['post' => $post, 'comment' => $comment]) }}">
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('comment.destroy', ['post' => $post, 'comment' => $comment]) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-dark"
                                                            onclick="return confirm('Are you sure you want to delete this job?');">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endcan


                            </div>
                            <p class=" ms-2 mx-auto  my-2">{{ $comment->body }}</p>


                        </div>
                    @endforeach
                </div>
            @endif
            <div class="col-8">
                <form action="{{ route('comment.store', ['post' => $post]) }}" method="POST">
                    @csrf
                    <div class="mb-3">

                        <textarea class="form-control" id="comment" name="body" rows="3"
                            placeholder="Write your comment here..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Your Comment</button>
                </form>

            </div>
        </div>
    @endif


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var successToast = document.getElementById("successToast");
            if (successToast && "{{ session('success') }}" !== "") {
                var toast = new bootstrap.Toast(successToast);
                toast.show();
            }
        });
    </script>




</x-app-layout>
