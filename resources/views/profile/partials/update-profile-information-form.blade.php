<section class="mb-5">
    <header>
        <h2 class="h4 text-primary">Profile Information</h2>
        <p class="text-muted">
            Update your account's profile information and email address.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name"
                class="form-control  @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}"
                autofocus autocomplete="name">
            @if ($errors->has('name'))
                <div class="text-danger mt-2">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email"
                class="form-control  @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                autocomplete="username">
            @if ($errors->has('email'))
                <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted small">
                        Your email address is unverified.
                        <button form="send-verification" class="btn btn-link p-0">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small mt-2">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>
        @can('employer-only')
            <div class="mb-3">
                <label class="form-label">company</label>
                <input type="text" class="form-control  @error('company') is-invalid @enderror" name="company"
                    value="{{ old('company', $user->company) }}" autocomplete="username">
                @if ($errors->has('company'))
                    <div class="text-danger mt-2">{{ $errors->first('company') }}</div>
                @endif
            </div>
        @endcan

        @can('candidate-only')
            <div class="mb-3">
                <label class="form-label">resume</label>
                <input type="file" class="form-control  @error('resume') is-invalid @enderror"
                    value="{{ old('resume', $user->resume) }}" autocomplete="username" name="resume">
                @if ($errors->has('resume'))
                    <div class="text-danger mt-2">{{ $errors->first('resume') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">skills</label>
                <input type="text" class="form-control  @error('skills') is-invalid @enderror"
                    value="{{ old('skills', $user->skills) }}" autocomplete="username" name="skills">
                @if ($errors->has('skills'))
                    <div class="text-danger mt-2">{{ $errors->first('skills') }}</div>
                @endif
            </div>
        @endcan

        <div class="mb-3">
            <label class="form-label">image</label>
            <input type="file" class="form-control  @error('image') is-invalid @enderror"
                value="{{ old('image', $user->image) }}" autocomplete="username" name="image">
            @if ($errors->has('image'))
                <div class="text-danger mt-2">{{ $errors->first('image') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">phone</label>
            <input type="text" class="form-control  @error('phone') is-invalid @enderror"
                value="{{ old('phone', $user->phone) }}" autocomplete="username" name="phone">
            @if ($errors->has('phone'))
                <div class="text-danger mt-2">{{ $errors->first('phone') }}</div>
            @endif
        </div>
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'profile-updated')
                <p class="text-success small m-0" id="profile-update-success">Saved.</p>
                <script>
                    setTimeout(() => {
                        document.getElementById('profile-update-success').style.display = 'none';
                    }, 2000);
                </script>
            @endif
        </div>
    </form>
</section>
