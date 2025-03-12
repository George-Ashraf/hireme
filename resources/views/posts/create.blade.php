<x-app-layout>

    <div class=" bg-white ">


        <div class="container p-5 ">
            <div class="card p-4 shadow m-5  ">
                <h2 class=" mb-4">Post a New Job</h2>

                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                            name="job_title" value="{{ old('job_title') }}">
                        @error('job_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Job Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ old('description') }}">
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="company">Company Name</label>
                        <input type="text" class="form-control " name="comapny"
                            value="{{ auth()->user()->company ?? old('company') }}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="salary">Salary</label>
                        <input min="0" type="number" step="1"
                            class="form-control @error('salary') is-invalid @enderror" name="salary"
                            value="{{ old('salary') }}">
                        @error('salary')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="location">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                            name="location" value="{{ old('location') }}">
                        @error('location')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="work_type">Work Type</label>
                        <select class="form-control @error('work_type') is-invalid @enderror" name="work_type">
                            <option value="remote" {{ old('work_type') == 'remote' ? 'selected' : '' }}>Remote</option>
                            <option value="hybrid" {{ old('work_type') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            <option value="onsite" {{ old('work_type') == 'onsite' ? 'selected' : '' }}>Onsite</option>
                        </select>
                        @error('work_type')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="experience_level">Experience Level</label>
                        <select class="form-control @error('experience_level') is-invalid @enderror"
                            name="experience_level">
                            <option value="junior" {{ old('experience_level') == 'junior' ? 'selected' : '' }}>Junior
                            </option>
                            <option value="mid_level" {{ old('experience_level') == 'mid_level' ? 'selected' : '' }}>
                                Mid
                                Level</option>
                            <option value="senior" {{ old('experience_level') == 'senior' ? 'selected' : '' }}>Senior
                            </option>
                        </select>
                        @error('experience_level')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="form-group mb-3">
                        <label for="skills">Skills (Comma-separated)</label>
                        <textarea class="form-control @error('skills') is-invalid @enderror" name="skills" rows="2">{{ old('skills') }}</textarea>
                        @error('skills')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="responsibility">Responsibilities</label>
                        <textarea class="form-control @error('responsibility') is-invalid @enderror" name="responsibility" rows="3">{{ old('responsibility') }}</textarea>
                        @error('responsibility')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="qualification">Qualifications</label>
                        <textarea class="form-control @error('qualification') is-invalid @enderror" name="qualification" rows="3">{{ old('qualification') }}</textarea>
                        @error('qualification')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="benefits">Benefits</label>
                        <textarea class="form-control @error('benefits') is-invalid @enderror" name="benefits" rows="3">{{ old('benefits') }}</textarea>
                        @error('benefits')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="closed_date">Application Deadline</label>
                        <input type="date" class="form-control @error('closed_date') is-invalid @enderror"
                            name="closed_date" value="{{ old('closed_date') }}">
                            @error('closed_date')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Job Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Post Job</button>
                </form>
            </div>
        </div>


</x-app-layout>
