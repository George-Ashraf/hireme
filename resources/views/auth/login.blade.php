<x-app-layout>
    <div class="bg-white">
        <div class="container p-5">
            <div class="card p-4 shadow m-5">
                <h2 class="mb-4">Log in to Your Account</h2>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                            required autofocus autocomplete="username">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required
                            autocomplete="current-password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label class="form-check-label" for="remember_me">Remember Me</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-primary" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>