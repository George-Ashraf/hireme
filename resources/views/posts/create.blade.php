@extends('layouts.app')

@section('content')
<!-- Changed from 'slot' to 'content' -->
<div class="container p-5 ">
    <div class="card p-4 shadow m-5  ">
        <h2 class=" mb-4">Post a New Job</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" name="job_title" required>
            </div>

            <div class="form-group mb-3">
                <label for="company">Company Name</label>
                <input type="text" class="form-control" name="comapny" required>
            </div>

            <div class="form-group mb-3">
                <label for="salary">Salary</label>
                <input type="number" step="0.01" class="form-control" name="salary">
            </div>

            <div class="form-group mb-3">
                <label for="location">Location</label>
                <input type="text" class="form-control" name="location" required>
            </div>

            <div class="form-group mb-3">
                <label for="work_type">Work Type</label>
                <select class="form-control" name="work_type">
                    <option value="remote">Remote</option>
                    <option value="hybrid">Hybrid</option>
                    <option value="onsite">Onsite</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="experience_level">Experience Level</label>
                <select class="form-control" name="experience_level">
                    <option value="junior">Junior</option>
                    <option value="mid_level">Mid Level</option>
                    <option value="senior">Senior</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="skills">Skills (Comma-separated)</label>
                <textarea class="form-control" name="skills" rows="2"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="responsibility">Responsibilities</label>
                <textarea class="form-control" name="responsibility" rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="qualification">Qualifications</label>
                <textarea class="form-control" name="qualification" rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="benefits">Benefits</label>
                <textarea class="form-control" name="benefits" rows="3"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="closed_date">Application Deadline</label>
                <input type="date" class="form-control" name="closed_date">
            </div>

            <div class="form-group mb-3">
                <label for="image">Job Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>

            <div class="form-group mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" required>
                    <option value="">Select a Category</option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Post Job</button>
        </form>
    </div>
</div>
@endsection