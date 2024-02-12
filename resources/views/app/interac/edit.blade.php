<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <h1>Modifier le statut</h1>
                    <x-forms.update :item="$interac" :fields="$my_fields" type="interac" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
