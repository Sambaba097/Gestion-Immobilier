<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    {{-- // afficher la liste des biens s'il existe --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">

                        <h3 class="text-lg font-semibold mb-4">Liste des biens :</h3>
    
                        <a href="{{ route('propertie.create') }}" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                         Ajouter un bien
                     </a>
                    </div>

                    <!-- Vérifier s'il y a des biens -->
                    @if ($property->isEmpty())
                        <p>Aucun bien disponible.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Adresse</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'enregistrement</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($property as $properties)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $property->nom }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $property->categorie }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $property->statut }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $property->adresse }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $property->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}


</x-app-layout>
