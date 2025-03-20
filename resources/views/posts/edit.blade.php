<x-app-layout>
    <div class="bg-white">
        <div class="container p-5">
            <div class="card p-4 shadow m-5">
                <h2 class="mb-4">Edit Job Post</h2>

                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="job_title" class="form-label">Job Title</label>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                            name="job_title" value="{{ old('job_title', $post->job_title) }}" required>
                        @error('job_title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Job Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            rows="3" required>{{ old('description', $post->description) }}</textarea>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company"
                            value="{{ auth()->user()->company ?? old('company', $post->company) }}" readonly required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input min="0" type="number" step="1" class="form-control @error('salary') is-invalid @enderror"
                            name="salary" value="{{ old('salary', $post->salary) }}">
                        @error('salary')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                            value="{{ old('location', $post->location) }}" required>
                        @error('location')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="work_type" class="form-label">Work Type</label>
                        <select class="form-control @error('work_type') is-invalid @enderror" name="work_type">
                            <option value="remote"
                                {{ old('work_type', $post->work_type) == 'remote' ? 'selected' : '' }}>Remote</option>
                            <option value="hybrid"
                                {{ old('work_type', $post->work_type) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            <option value="onsite"
                                {{ old('work_type', $post->work_type) == 'onsite' ? 'selected' : '' }}>Onsite</option>
                        </select>
                        @error('work_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="experience_level" class="form-label">Experience Level</label>
                        <select class="form-control @error('experience_level') is-invalid @enderror"
                            name="experience_level">
                            <option value="junior"
                                {{ old('experience_level', $post->experience_level) == 'junior' ? 'selected' : '' }}>
                                Junior</option>
                            <option value="mid_level"
                                {{ old('experience_level', $post->experience_level) == 'mid_level' ? 'selected' : '' }}>
                                Mid Level</option>
                            <option value="senior"
                                {{ old('experience_level', $post->experience_level) == 'senior' ? 'selected' : '' }}>
                                Senior</option>
                        </select>
                        @error('experience_level')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="skills" class="form-label">Skills (Comma-separated)</label>
                        <textarea class="form-control @error('skills') is-invalid @enderror" name="skills"
                            rows="2">{{ old('skills', $post->skills) }}</textarea>
                        @error('skills')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="responsibility" class="form-label">Responsibilities</label>
                        <textarea class="form-control @error('responsibility') is-invalid @enderror"
                            name="responsibility" rows="3">{{ old('responsibility', $post->responsibility) }}</textarea>
                        @error('responsibility')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="qualification" class="form-label">Qualifications</label>
                        <textarea class="form-control @error('qualification') is-invalid @enderror" name="qualification"
                            rows="3">{{ old('qualification', $post->qualification) }}</textarea>
                        @error('qualification')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="benefits" class="form-label">Benefits</label>
                        <textarea class="form-control @error('benefits') is-invalid @enderror" name="benefits"
                            rows="3">{{ old('benefits', $post->benefits) }}</textarea>
                        @error('benefits')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="closed_date" class="form-label">Application Deadline</label>
                        <input type="date" class="form-control @error('closed_date') is-invalid @enderror"
                            name="closed_date" value="{{ old('closed_date', $post->closed_date) }}">

                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Job Image</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        @if($post->image)
                        <p class="mt-2">Current Image:</p>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Job Image" width="150">
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id"
                            required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update Job</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>