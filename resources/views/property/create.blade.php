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
  <div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Ajouter un nouveau bien</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('propertie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Nom -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-medium mb-2">Nom du bien</label>
                <input type="text" name="nom" id="nom" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                       placeholder="Nom du bien" required>
            </div>

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-medium mb-2">Catégorie</label>
                <input type="text" name="category" id="category" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                       placeholder="Catégorie (ex: luxe, économique...)" required>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" name="image" id="image" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                       accept="image/*" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Description détaillée du bien" required></textarea>
            </div>

            <!-- Adresse -->
            <div class="mb-4">
                <label for="adresse" class="block text-gray-700 font-medium mb-2">Adresse</label>
                <input type="text" name="adresse" id="adresse" 
                       class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                       placeholder="Adresse de localisation" required>
            </div>

            <!-- Statut -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">Statut</label>
                <select name="status" id="status" 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="libre">Libre</option>
                    <option value="occupé">Occupé</option>
                </select>
            </div>

            <!-- Bouton de soumission -->
            <div class="mt-6">
                <button type="submit" 
                        class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700">
                    Ajouter le bien
                </button>
            </div>
        </form>
    </div>
  </div>
    
</body>
</html>