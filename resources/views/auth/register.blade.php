<x-app-layout>
    <div class="bg-white">
        <div class="container p-5">
            <div class="card p-4 shadow m-5">
                <h2 class="mb-4">Create an Account</h2>

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name"
                            value="{{ old('name') }}" autofocus autocomplete="name">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email"
                            value="{{ old('email') }}" autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div class="form-group mb-3">
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" class="form-control" name="phone"
                            value="{{ old('phone') }}">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>


                    <!-- Role Selection -->
                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <select id="role" class="form-control" name="role" onchange="toggleFields()">
                            <option value="candidate" {{ old('role') == 'candidate' ? 'selected' : '' }}>Candidate
                            </option>
                            <option value="employer" {{ old('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Resume (Only for Candidates) -->
                    <div id="resume-container" class="form-group mb-3">
                        <label for="resume">Upload Resume </label>
                        <input id="resume" type="file" class="form-control" name="resume"
                            accept=".pdf,.doc,.docx">
                        <x-input-error :messages="$errors->get('resume')" class="mt-2" />
                    </div>

                    <div id="skills-container" class="form-group mb-3">
                        <label for="skills">Skills (Comma-separated)</label>
                        <textarea class="form-control @error('skills') is-invalid @enderror" name="skills" rows="2">{{ old('skills') }}</textarea>
                        @error('skills')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Company (Only for Employers) -->
                    <div id="company-container" class="form-group mb-3">
                        <label for="company">Company (Optional)</label>
                        <input id="company" type="text" class="form-control" name="company"
                            value="{{ old('company') }}">
                        <x-input-error :messages="$errors->get('company')" class="mt-2" />
                    </div> <!-- Profile Image -->
                    <div class="form-group mb-3">
                        <label for="image">Profile Image (Optional)</label>
                        <input id="image" type="file" class="form-control" name="image" accept="image/*">
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password"
                            autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control"
                            name="password_confirmation" autocomplete="new-password">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a class="text-sm text-primary" href="{{ route('login') }}">
                            Already registered?
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function toggleFields() {
            var role = document.getElementById("role").value;
            var resumeContainer = document.getElementById("resume-container");
            var skillsContainer = document.getElementById("skills-container");
            var companyContainer = document.getElementById("company-container");

            if (role === "candidate") {
                resumeContainer.style.display = "block"; // Show Resume
                skillsContainer.style.display = "block"; // Show skills
                companyContainer.style.display = "none"; // Hide Company
                resumeContainer.querySelector("input").setAttribute("required", "required");
                skillsContainer.querySelector("input").setAttribute("required", "required");


            } else {
                resumeContainer.style.display = "none"; // Hide Resume
                skillsContainer.style.display = "none"; // hide skills
                companyContainer.style.display = "block"; // Show Company
                resumeContainer.querySelector("input").removeAttribute("required");
                skillsContainer.querySelector("input").removeAttribute("required");

            }
        }

        // Run on page load to set correct visibility (especially when reloading with old values)
        document.addEventListener("DOMContentLoaded", toggleFields);
    </script>
</x-app-layout>
