<x-app-layout>


    <div class="container col-lg-6 mt-4">
        <h1 class="text-center text-primary">Edit Category</h1>
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ $category->name }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
<<<<<<< HEAD
                <input type="text" class="form-control  @error('icon') is-invalid @enderror" name="icon"
=======
                <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon"
>>>>>>> origin/george
                    value="{{ $category->icon }}">
                @error('icon')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>




            <button class="btn btn-primary">edit category</button>
        </form>

    </div>




<<<<<<< HEAD
</x-app-layout>
=======
</x-app-layout>
>>>>>>> origin/george
