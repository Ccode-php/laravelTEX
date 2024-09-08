<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Applications') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-11">

            <div class="p-6 text-gray-500">
                    <p class="mb-3 text-blue-500 text-xl font-bold"><span>Xabarnamalarim!</span></p>
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
                                    <div class="text-lg font-bold text-slate-700">{{ Auth::user()->name }}</div>
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
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 9h3.75m-4.5 2.625h4.5M12 18.75 9.75 16.5h.375a2.625 2.625 0 0 0 0-5.25H9.75m.75-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                                File
                                            </a>
                                        @endif


                                    </div>

                                </div>

                            </div>

                            @if ($application->answer()->exists())
                                <div>
                                    <hr>
                                    <h3>Answer:<p>{{ $application->answer->body }}</p>
                                    </h3>
                                </div>
                            @endif

                        </div>
                        
                    @endforeach
                    <div class="flex col-12 items-center">
                        {{ $applications->links() }}
                    </div>
            </div>
        </div>
    </div>

</x-app-layout>
