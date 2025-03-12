<x-app-layout>
    @foreach ($pendingposts as $post)
        <div class="job-item p-4 mb-4">
            <div class="row g-4">
                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                    <img class="flex-shrink-0 img-fluid border rounded"
                        src="{{ asset(' storage/public' . '/' . $post->image) }}" alt=""
                        style="width: 80px; height: 80px;">
                    <div class="text-start ps-4">
                        <h5 class="mb-3">{{ $post->job_title }}</h5>
                        <span>
                            @if ($post->status == 'Pending')
                         <div class="alert alert-warning text-center">
                            <p>not accepted</p>
                         </div>
                        @else
                        <div class="alert alert-success text-center">
                            <p> accepted</p>
                         </div>

                        @endif
                        </span>
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
                    <div class="d-flex justify-content-center align-items-center flex-column mb-3">
                        @if ($post->status == 'Pending')
                            <a class="btn btn-success mb-3" href="{{ route('posts.status', $post->id) }}">accept</a>
                        @else
                            <a class="btn btn-warning mb-3" href="{{ route('posts.status', $post->id) }}">pull the post</a>

                        @endif


                        <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">Show details</a>

                    </div>
                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line:
                        {{ $post->closed_date }}</small>
                </div>

            </div>
        </div>
    @endforeach


</x-app-layout>
