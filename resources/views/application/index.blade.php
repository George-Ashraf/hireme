<x-app-layout>
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <a href="{{ route('application.create') }}" class="btn btn-primary mb-3">add category</a>

        <div class="row g-4">
            @foreach ($applications as $application)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">


                    <h6 class="mb-3"> {{ $application->status}}
                    <p class="mb-0">123 Vacancy</p>
                </div>
            </div>
             @endforeach
        </div>
    </div>
</div>
</x-app-layout>
