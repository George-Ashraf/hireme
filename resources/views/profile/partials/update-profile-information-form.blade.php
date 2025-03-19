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

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
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
