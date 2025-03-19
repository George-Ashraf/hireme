<x-app-layout>
    <div class="container col-lg-6 mt-4">
        <h1 class="text-center text-primary">Update Your Comment</h1>
        <form action="{{ route('comment.update', ['post' => $post, 'comment' => $comment]) }}
" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Comment</label>
                <textarea class="form-control" id="comment" name="body" rows="3" placeholder="Write your comment here..."
                    required> {{ $comment->body }}</textarea>


            </div>

            <button class="btn btn-primary">Update</button>
        </form>

    </div>




</x-app-layout>
