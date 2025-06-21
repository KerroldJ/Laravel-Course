<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

   <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-2xl">
            <form action="{{ route('note.update', $note) }}" method="post">
                @method('put') 
                @csrf

                {{-- Title Field --}}
                <x-text-input name="title" type="text" placeholder="Title" class="w-full" value="{{ old('title', $note->title) }}"/>
                @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                {{-- Text Field --}}
                <x-textarea name="text" placeholder="Type your note here..." rows="8" class="mt-4 w-full" value="{{ old('text', $note->text) }}"> </x-textarea>
                
                @error('text')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
                

                <select name="notebook_id" id="notebook_id" class="mt-4 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Select Notebook</option>
                    @foreach ($notebooks as $book)
                        <option value="{{ $book->id }}"
                            @if ($book->id == old('notebook_id', $note->notebook_id))
                                selected    
                            @endif
                            >
                            {{ $book->name }}
                        </option>
                    @endforeach
                </select>

                <x-primary-button class="mt-6">Update Note</x-primary-button>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
