<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body>
   <!-- Navbar -->
   <nav class="bg-blue-600 p-4">

    <div class="container mx-auto flex justify-between items-center">
      <!-- Logo -->
      <a href="/home" class="text-white text-xl font-bold">
        Horizon Bâtisseur
      </a>
      <!-- Navigation Links -->
      <div class="flex items-center space-x-6">
        <a href="{{ route('propertie.create') }}" class="text-white font-medium hover:text-gray-200">
          Ajouter bien
        </a>
        <a href="{{ route('propertie.admin') }}" class="text-white font-medium hover:text-gray-200">
            Gerer bien
        </a>
        <a href="{{ route('dashboard') }}" class="text-white font-medium hover:text-gray-200">
          Dashboard
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-white text-blue-600 font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 hover:text-white transition duration-300">
              Déconnexion
            </button>
        </form>
    </div>
    </div> 
    </div>
  </nav>
  <!-- Main Content -->
 <!-- Liste des biens avec options de modification et suppression -->
 <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Gestion des biens</h1>

    @if ($property->isEmpty())
        <p class="text-gray-600 text-lg">Aucun bien enregistré pour le moment.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-3 px-6 text-left">Nom</th>
                        <th class="py-3 px-6 text-left">Catégorie</th>
                        <th class="py-3 px-6 text-left">Adresse</th>
                        <th class="py-3 px-6 text-left">Statut</th>
                        <th class="py-3 px-6 text-left">Image</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property as $properties)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $properties->nom }}</td>
                            <td class="py-3 px-6">{{ $properties->category }}</td>
                            <td class="py-3 px-6">{{ $properties->adresse }}</td>
                            <td class="py-3 px-6">
                                <span class="{{ $properties->status == 'libre' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ ucfirst($properties->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-6">
                                @if ($properties->image)
                                    <img src="{{ asset('storage/' . $properties->image) }}" alt="Image du bien" class="w-16 h-16 object-cover rounded-md">
                                @else
                                    <span>Aucune image</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-center">
                                <!-- Modifier le bien -->
                                <a href="{{ route('propertie.edit', $properties->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">
                                    Modifier
                                </a>

                                <!-- Supprimer le bien -->
                                <form action="{{ route('propertie.destroy', $properties->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</body>
</html>