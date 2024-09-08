<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-11">

            <div class="p-6 text-gray-500">


                <!-- component -->
                <div class='flex items-center '>
                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        <div class='max-w-md mx-auto space-y-6'>

                            <form action="{{ route('answers.store', ['application' => $application->id]) }}" method="POST">
                                @csrf
                                <h2 class="text-2xl font-bold ">Answer application #{{ $application->id }}</h2>
                                <hr class="my-6">

                                <label class="uppercase text-sm font-bold opacity-70">Answer</label>
                                <textarea name="body" required rows="5"
                                    class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>

                                <input type="submit"
                                    class="middle none center mr-4 rounded-lg bg-green-500 py-3 px-4 font-sans text-sm font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    value="Submit">

                                    <a href="{{ route('dashboard') }}" class="middle none center mr-4 rounded-lg bg-red-500 py-3 px-4 font-sans text-sm font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Cancel</a>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
