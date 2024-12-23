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
      <a href="{{ route('propertie.home')}}" class="text-white text-xl font-bold">
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
  <!-- Liste des biens -->
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Liste des biens</h1>
    @if ($property->isEmpty())
        <p class="text-gray-600 text-lg">Aucun bien enregistré pour le moment.</p>
    @else
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($property as $properties)
            <div class="bg-white shadow-md rounded-lg p-4">
            <img src="{{ asset('storage/' . $properties->image) }}" alt="Image du bien" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-xl font-bold text-gray-800">{{ $properties->nom }}</h2>
            <p class="text-gray-600 text-sm">Catégorie : {{ $properties->category }}</p>
            <p class="text-gray-700 mt-2">{{ $properties->description }}</p>
            <p class="text-gray-600 mt-2 text-sm">Adresse : {{ $properties->adresse }}</p>
            <p class="text-gray-600 mt-2 text-sm">
                Statut : 
                <span class="{{ $properties->status == 'libre' ? 'text-green-500' : 'text-red-500' }}">
                {{ ucfirst($properties->status) }}
                </span>
            </p>
            <a href="{{ route('propertie.show', $properties->id) }}" 
                class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                 Voir détails
             </a>
            </div>
        @endforeach
        </div>
    @endif
  </div>
</body>
</html>