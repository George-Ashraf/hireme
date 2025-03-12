<section class="mb-5">
    <header>
        <h2 class="h4 text-primary">Update Password</h2>
        <p class="text-muted">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <input type="password" id="update_password_current_password" name="current_password" class="form-control"
                autocomplete="current-password">
            @if ($errors->updatePassword->has('current_password'))
            <div class="text-danger mt-2">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <input type="password" id="update_password_password" name="password" class="form-control"
                autocomplete="new-password">
            @if ($errors->updatePassword->has('password'))
            <div class="text-danger mt-2">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                class="form-control" autocomplete="new-password">
            @if ($errors->updatePassword->has('password_confirmation'))
            <div class="text-danger mt-2">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'password-updated')
            <p class="text-success small m-0" id="password-update-success">Saved.</p>
            <script>
            setTimeout(() => {
                document.getElementById('password-update-success').style.display = 'none';
            }, 2000);
            </script>
            @endif
        </div>
    </form>
</section>