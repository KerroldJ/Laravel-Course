<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-alert-success>{{ session('success') }}</x-alert-success>
            
           <span class=" px-2 py-1 bg-gray-200 dark:bg-gray-700 rounded-md text-gray-800 dark:text-gray-200 rounded text-sm font-semibold">
            {{ $note->notebook->name }}
           </span>
           
            <div class=" flex gap-6 text-white">
                <p class="opacity-70"> <strong> Created: </strong> {{ $note->created_at->diffForHumans() }} </p>
                <p class="opacity-70"><strong> Last Changed: </strong> {{ $note->updated_at->diffForHumans() }}</p>

                <x-link-button href="{{ route('note.edit', $note) }}" class="ml-auto" >Edit Note</x-link-button>

                <form method="post" action="{{ route('note.destroy', $note) }}">
                    @method('delete')
                    @csrf

                    <x-primary-button class="bg-red-600 hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this note?')">
                        Delete Note
                    </x-primary-button>
                </form>

            </div>
            <div class="bg-white p-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 dark:text-gray-100">                    
                    <h2 class="font-bold text-4xl text-indigo-600">
                      {{ $note->title }}
                    </h2>
                    <p class="mt-4 whitespace-pre-wrap">{{ $note->text }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
