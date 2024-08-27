<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-11">

            <div class="p-6 text-gray-500">
                @if (auth()->user()->role->name == 'manager')
                    <p class="mb-3 text-blue-500 text-xl font-bold"><span>Xabarnamalar!</span></p>
                    <!-- component -->
                    <!-- This is an example component -->
                    @foreach ($applications as $application)
                        <div class="rounded-xl border p-5 mt-5 shadow-md w-9/12 bg-white">
                            <div class="flex w-full items-center justify-between border-b pb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="h-8 w-8 rounded-full bg-slate-400 bg">
                                        <img class="image rounded-circle"
                                            src="{{ asset('storage/' . $application->user->image) }}">
                                    </div>
                                    <div class="text-lg font-bold text-slate-700">{{ $application->user->name }}</div>
                                </div>
                                <div class="flex items-center space-x-8">
                                    <button
                                        class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">{{ $application->id }}</button>
                                    <div class="text-xs text-neutral-500">{{ $application->created_at }}</div>
                                </div>
                            </div>

                            <div class="flex justify-between">
                                <div>
                                    <div class="mt-4 mb-3">
                                        <div class="mb-3 text-xl font-bold">{{ $application->subject }} </div>
                                        <div class="text-sm text-neutral-1000">{{ $application->message }}</div>
                                    </div>


                                    <div class="flex items-center justify-between text-slate-900">
                                        {{ $application->user->email }}
                                    </div>
                                </div>
                                <div
                                    class="border p-6 m-6 rounded hover:bg-gray-50 transition cursor-pointer flex flex-col items-center ">
                                    <div>
                                        @if (is_null($application->file_url))
                                            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            No file
                                        @else
                                            <a href="{{ asset('storage/' . $application->file_url) }}"
                                                target="_blank"><svg fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18 18 6M6 6l12 12" />
                                                </svg>
                                                File
                                            </a>
                                        @endif


                                    </div>
                                </div>
                            </div>



                        </div>
                    @endforeach
                @else
                    <!-- component -->
                    <div class='flex items-center '>
                        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                            <div class='max-w-md mx-auto space-y-6'>

                                <form action="{{ route('applications.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="text-2xl font-bold ">Submit your application</h2>
                                    <hr class="my-6">
                                    <label class="uppercase text-sm font-bold opacity-70">Subject</label>
                                    <input type="text" name="subject" required
                                        class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                    <label class="uppercase text-sm font-bold opacity-70">Message</label>
                                    <textarea name="message" required rows="5"
                                        class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                                    <label class="uppercase text-sm font-bold opacity-70">File</label>
                                    <input type="file" name="file_url"
                                        class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                                    <input type="submit"
                                        class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300"
                                        value="Send">
                                </form>

                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex col-12 items-center">
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
