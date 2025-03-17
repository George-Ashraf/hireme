<x-app-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore Applications</h1>

            <div class="container-xxl py-5">
                <div class="container">
                    <h4 class="text-center mb-4 wow fadeInUp" data-wow-delay="0.1s">Applications List</h4>

                    <table class="table table-bordered table-hover shadow-sm">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Profile pic</th>
                                <th>Candidate</th>
                                <th>Job Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($applications as $application)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $application->user->image) }}" alt="User Image"
                                        class="rounded-circle" width="40" height="40">
                                </td>
                                <td>{{ $application->user->name }}</td>
                                <td>{{ $application->post->job_title }}</td>
                                <td>
                                    <p class="d-flex align-items-center">
                                        <span
                                            class="badge rounded-pill bg-{{ $application->status === 'Approved' ? 'success' : ($application->status === 'Rejected' ? 'danger' : 'warning') }}">
                                            <i
                                                class="fas fa-{{ $application->status === 'Approved' ? 'check' : ($application->status === 'Rejected' ? 'times' : 'clock') }} me-1"></i>
                                            {{ $application->status }}
                                        </span>
                                    </p>
                                </td>
                                <td>
                                    <a href="{{ route('application.show', $application->id) }}"
                                        class="btn btn-sm btn-dark">Show</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>