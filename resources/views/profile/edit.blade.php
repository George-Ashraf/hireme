<x-app-layout>
    <div class="bg-white py-5">
        <div class="container">
            <div class="card p-4 shadow mb-4">

                <!-- Update Profile Information -->
                <div class="card p-4 shadow mb-4">
                    <div class="w-100">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="card p-4 shadow mb-4">
                    <div class="w-100">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="card p-4 shadow">
                    <div class="w-100">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>