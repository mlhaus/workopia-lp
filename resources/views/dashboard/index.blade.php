<x-workopia-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <h1>{{ $title }}</h1>
    <section class="flex flex-col md:flex-row gap-6">
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2">
            <h3 class="text-3xl text-center font-bold mb-4">Profile Info</h3>
{{--            @if($user->avatar)--}}
{{--                <div class="mt-2 flex justify-center">--}}
{{--                    <img--}}
{{--                        src="{{ asset('storage/' . $user->avatar) }}"--}}
{{--                        alt="Avatar"--}}
{{--                        class="w-32 h-32 object-cover rounded-full"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            Use this for siteground--}}
            @if($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img
                        src="/storage/{{  $user->avatar }}"
                        alt="{{$user->first_name}} {{$user->last_name}}"
                        class="w-32 h-32 object-cover rounded-full"
                    />
                </div>
            @endif
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-inputs.text
                    id="first_name"
                    name="first_name"
                    label="First Name"
                    type="text"
                    value="{{ old('first_name', $user->first_name) }}"
                />
                <x-inputs.text
                    id="last_name"
                    name="last_name"
                    label="Last Name"
                    type="text"
                    value="{{ old('last_name', $user->last_name) }}"
                />
                <x-inputs.text
                    id="email"
                    name="email"
                    label="Email address"
                    type="text"
                    value="{{ old('email', $user->email) }}"
                />
                <x-inputs.file
                    id="avatar"
                    name="avatar"
                    label="Profile avatar"
                />
                <button type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">Save</button>
            </form>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-1/2">
        <h3 class="text-3xl text-center font-bold mb-4">My Job Listings</h3>
        @forelse ($jobs as $job)
            <div
                class="flex justify-between items-center border-b-2 border-gray-200 py-2"
            >
                <div>
                    <h3 class="text-xl font-semibold">{{ $job->title }}</h3>
                    <p class="text-gray-700">{{ $job->job_type }}</p>
                </div>
                <div class="flex space-x-4">
                    <a
                        href="{{ route('jobs.edit', $job->id) }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm"
                    >Edit</a
                    >
                    <form
                        method="POST"
                        action="{{ route('jobs.destroy', $job->id) }}?from=dashboard"
                        onsubmit="return confirm('Are you sure you want to delete this job?');"
                    >
                        @csrf @method('DELETE')
                        <button
                            type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm"
                        >
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            {{-- Job Applicants--}}
            <div class="mt-4">
                <h4 class="text-lg font-semibold mb-4">Applicants</h4>
                @forelse($job->applicants as $applicant)
                    <div class="py-2">
                        <p class="text-gray-800">
                            <strong>Name: </strong> {{$applicant->full_name}}
                        </p>
                        <p class="text-gray-800">
                            <strong>Phone: </strong> {{$applicant->contact_phone}}
                        </p>
                        <p class="text-gray-800">
                            <strong>Email: </strong> {{$applicant->contact_email}}
                        </p>
                        <p class="text-gray-800">
                            <strong>Message: </strong> {{$applicant->message}}
                        </p>
                        <p class="text-gray-800">
                            <strong>Location: </strong> {{$applicant->location}}
                        </p>
                        <p class="text-gray-800 my-4">
                            <a href="{{asset('storage/' . $applicant->resume_path)}}" class="text-blue-500 hover:underline" download>
                                <i class="fas fa-download"></i> Download Resume
                            </a>
                        </p>

                        <form
                            method="POST"
                            action="{{ route('applicants.destroy', $applicant->id) }}"
                            onsubmit="return confirm('Are you sure you want to delete this applicant?');"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm"
                            >
                                <i class="fas fa-trash-alt"></i> Delete Applicant
                            </button>
                        </form>

                    </div>
                @empty
                    <p>There are no applicants</p>
                @endforelse
            </div>


        @empty
            <p class="text-gray-700">You have no job listings.</p>
        @endforelse
    </div>
    </section>
</x-workopia-layout>
