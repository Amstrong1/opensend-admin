<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Chat</h1>
                        {{-- <a href="{{ route('chat.create') }}">
                            <x-primary-button>
                                Nouveau
                            </x-primary-button>
                        </a> --}}
                    </div>
                    <div class="mt-4">
                        <x-tables.default :mactions="$my_actions" :resources="$chats" :mattributes="$my_attributes" type="chat" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
