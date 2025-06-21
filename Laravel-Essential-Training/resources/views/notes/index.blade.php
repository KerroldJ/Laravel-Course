<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-link-button href="{{ route('note.create') }}">
                + Create New Note
            </x-link-button>
            @forelse ( $notes as $note )
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">                    
                    <h2 class="font-bold text-2xl">{{ $note->title}}</h2>
                    <p class="mt-2">{{ Str::limit($note->text, 200, '...') }}</p>
                    <span class="block mt-2 text-sm opacity-70"> {{ $note->updated_at->diffForHumans()}}</span>
                </div>
            </div>
            @empty
            <p>You have no notes yet.</p>
             @endforelse
             {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
