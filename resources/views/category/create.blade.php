<x-app-layout>
    <div class="container col-lg-6 mt-4">
        <h1 class="text-center text-primary">Add Category</h1>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">icon</label>
                <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon">
                @error('icon')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">add category</button>
        </form>

    </div>




</x-app-layout>