@if (auth()->user()->can('store-post'))
<x-app-layout>
    <div class="bg-light py-5">
        <div class="container">
            <div class="card p-4 shadow-lg mx-auto" style="max-width: 800px;">
                <h2 class="mb-4 text-center text-primary fw-bold">Post a New Job</h2>

                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="job_title" class="fw-bold">Job Title</label>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                            name="job_title" value="{{ old('job_title') }}" placeholder="Enter job title">
                        @error('job_title') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="fw-bold">Job Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            rows="3" placeholder="Briefly describe the job">{{ old('description') }}</textarea>
                        @error('description') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="company" class="fw-bold">Company Name</label>
                        <input type="text" class="form-control" name="company"
                            value="{{ auth()->user()->company ?? old('company') }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="salary" class="fw-bold">Salary ($)</label>
                        <input min="0" type="number" step="1" class="form-control @error('salary') is-invalid @enderror"
                            name="salary" value="{{ old('salary') }}" placeholder="Enter salary amount">
                        @error('salary') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="location" class="fw-bold">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                            value="{{ old('location') }}" placeholder="City, State, Country">
                        @error('location') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="work_type" class="fw-bold">Work Type</label>
                            <select class="form-control @error('work_type') is-invalid @enderror" name="work_type">
                                <option value="remote" {{ old('work_type') == 'remote' ? 'selected' : '' }}>Remote
                                </option>
                                <option value="hybrid" {{ old('work_type') == 'hybrid' ? 'selected' : '' }}>Hybrid
                                </option>
                                <option value="onsite" {{ old('work_type') == 'onsite' ? 'selected' : '' }}>Onsite
                                </option>
                            </select>
                            @error('work_type') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="experience_level" class="fw-bold">Experience Level</label>
                            <select class="form-control @error('experience_level') is-invalid @enderror"
                                name="experience_level">
                                <option value="junior" {{ old('experience_level') == 'junior' ? 'selected' : '' }}>
                                    Junior</option>
                                <option value="mid_level"
                                    {{ old('experience_level') == 'mid_level' ? 'selected' : '' }}>Mid Level</option>
                                <option value="senior" {{ old('experience_level') == 'senior' ? 'selected' : '' }}>
                                    Senior</option>
                            </select>
                            @error('experience_level') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="skills" class="fw-bold">Skills (Comma-separated)</label>
                        <textarea class="form-control @error('skills') is-invalid @enderror" name="skills" rows="2"
                            placeholder="e.g., JavaScript, UX Design, PHP">{{ old('skills') }}</textarea>
                        @error('skills') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="closed_date" class="fw-bold">Application Deadline</label>
                        <input type="date" class="form-control @error('closed_date') is-invalid @enderror"
                            name="closed_date" value="{{ old('closed_date') }}">
                        @error('closed_date') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="fw-bold">Job Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="category_id" class="fw-bold">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="" disabled selected>Select a Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-danger small mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100">Post Job</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@else
@php
header('Location: ' . route('home'));
exit();
@endphp
@endif