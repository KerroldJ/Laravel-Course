<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notebook') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-link-button href="{{ route('notebook.create') }}">
                + Create New Notebook
            </x-link-button>  
            
            @forelse ($notebook as $book)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-4">
                    <div class="p-4 text-gray-900 dark:text-gray-100">
                        <h1 class="font-bold text-xl text-indigo-600">{{ $book->name }}</h1>
                    </div>
                </div>
                @empty
                <p>You have no notebooks yet.</p>
            @endforelse
            {{ $notebook->links() }}
        </div>
    </div>
</x-app-layout>
