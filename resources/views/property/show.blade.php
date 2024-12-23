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
      <a href="/" class="text-white text-xl font-bold">
        Horizon Bâtisseur
      </a>
      <!-- Navigation Links -->
    <div class="flex space-x-4">
        <a href="{{ route('propertie.create') }}" class="text-white font-medium hover:text-gray-200">
          Ajouter bien
        </a>
        <a href="{{ route('propertie.admin') }}" class="text-white font-medium hover:text-gray-200">
            Gerer bien
        </a>
        <a href="{{ route('dashboard') }}" class="text-white font-medium hover:text-gray-200">
          Dashboard
        </a>
    </div>
    </div> 
    </div>
  </nav>
  <!-- Main Content -->
   <!-- Détails du bien -->
   <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $property->nom }}</h1>

    <!-- Image avec taille normale -->
    <div class="mb-6">
        <img src="{{ asset('storage/' . $property->image) }}" 
             alt="Image du bien" 
             class="rounded-md shadow-lg">
    </div>

    <p class="text-gray-600 text-lg">Catégorie : {{ $property->category }}</p>
    <p class="text-gray-700 mt-4">{{ $property->description }}</p>
    <p class="text-gray-600 mt-4 text-lg">Adresse : {{ $property->adresse }}</p>
    <p class="text-gray-600 mt-4 text-lg">
        Statut : 
        <span class="{{ $property->status == 'libre' ? 'text-green-500' : 'text-red-500' }}">
            {{ ucfirst($property->status) }}
        </span>
    </p>
    <a href="{{ route('propertie.home') }}" class="mt-6 inline-block bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">
        Retour à la liste
    </a>
</div>
</body>
</html>