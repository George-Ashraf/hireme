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
                        <input type="text" class="form-control" name="job_title"
                            value="{{ old('job_title', $post->job_title) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Job Description</label>
                        <textarea class="form-control" name="description" rows="3"
                            required>{{ old('description', $post->description) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="company"
                            value="{{ auth()->user()->company ?? old('company', $post->company) }}" readonly required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input min="0" type="number" step="1" class="form-control" name="salary"
                            value="{{ old('salary', $post->salary) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location"
                            value="{{ old('location', $post->location) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="work_type" class="form-label">Work Type</label>
                        <select class="form-control" name="work_type">
                            <option value="remote"
                                {{ old('work_type', $post->work_type) == 'remote' ? 'selected' : '' }}>Remote</option>
                            <option value="hybrid"
                                {{ old('work_type', $post->work_type) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            <option value="onsite"
                                {{ old('work_type', $post->work_type) == 'onsite' ? 'selected' : '' }}>Onsite</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="experience_level" class="form-label">Experience Level</label>
                        <select class="form-control" name="experience_level">
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
                    </div>

                    <div class="form-group mb-3">
                        <label for="skills" class="form-label">Skills (Comma-separated)</label>
                        <textarea class="form-control" name="skills"
                            rows="2">{{ old('skills', $post->skills) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="responsibility" class="form-label">Responsibilities</label>
                        <textarea class="form-control" name="responsibility"
                            rows="3">{{ old('responsibility', $post->responsibility) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="qualification" class="form-label">Qualifications</label>
                        <textarea class="form-control" name="qualification"
                            rows="3">{{ old('qualification', $post->qualification) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="benefits" class="form-label">Benefits</label>
                        <textarea class="form-control" name="benefits"
                            rows="3">{{ old('benefits', $post->benefits) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="closed_date" class="form-label">Application Deadline</label>
                        <input type="date" class="form-control" name="closed_date"
                            value="{{ old('closed_date', $post->closed_date) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Job Image</label>
                        <input type="file" class="form-control-file" name="image">
                        @if($post->image)
                        <p class="mt-2">Current Image:</p>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Job Image" width="150">
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Update Job</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>