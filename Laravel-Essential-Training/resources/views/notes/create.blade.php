<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-2xl">
            <form action="{{ route('note.store') }}" method="post">
                @csrf

                {{-- Title Field --}}
                <x-text-input name="title" type="text" placeholder="Title" class="w-full" value="{{ old('title') }}"/>
                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                {{-- Text Field --}}
                <x-textarea name="text" placeholder="Type your note here..." rows="8" class="mt-4 w-full" value="{{ old('text') }}"> </x-textarea>
                
                @error('text')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                <x-primary-button class="mt-6">Save Note</x-primary-button>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
