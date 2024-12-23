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
  <!-- Formulaire de modification du bien -->
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Modifier le bien</h1>

    <form action="{{ route('propertie.update', $property->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label for="nom" class="block text-gray-700 font-medium">Nom</label>
        <input type="text" id="nom" name="nom" value="{{ old('nom', $property->nom) }}" class="w-full p-3 border border-gray-300 rounded-md" required>
        @error('nom')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="category" class="block text-gray-700 font-medium">Catégorie</label>
        <input type="text" id="category" name="category" value="{{ old('category', $property->category) }}" class="w-full p-3 border border-gray-300 rounded-md" required>
        @error('category')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="description" class="block text-gray-700 font-medium">Description</label>
        <textarea id="description" name="description" rows="4" class="w-full p-3 border border-gray-300 rounded-md" required>{{ old('description', $property->description) }}</textarea>
        @error('description')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="adresse" class="block text-gray-700 font-medium">Adresse</label>
        <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $property->adresse) }}" class="w-full p-3 border border-gray-300 rounded-md" required>
        @error('adresse')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="status" class="block text-gray-700 font-medium">Statut</label>
        <select id="status" name="status" class="w-full p-3 border border-gray-300 rounded-md" required>
          <option value="libre" {{ old('status', $property->status) == 'libre' ? 'selected' : '' }}>Libre</option>
          <option value="occupé" {{ old('status', $property->status) == 'occupé' ? 'selected' : '' }}>Occupé</option>
        </select>
        @error('status')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="image" class="block text-gray-700 font-medium">Image</label>
        <input type="file" id="image" name="image" class="w-full p-3 border border-gray-300 rounded-md">
        <small class="text-gray-500">Image actuelle :</small>
        @if ($property->image)
          <div class="mt-2">
            <img src="{{ asset('storage/' . $property->image) }}" alt="Image actuelle" class="w-32 h-32 object-cover rounded-md">
          </div>
        @else
          <p class="text-gray-500">Aucune image actuellement.</p>
        @endif
        @error('image')
          <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex space-x-4">
        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700">
          Mettre à jour
        </button>
        <a href="{{ route('propertie.admin') }}" class="bg-gray-400 text-white py-2 px-6 rounded-md hover:bg-gray-500">
          Annuler
        </a>
      </div>
    </form>
  </div>

</body>
</html>