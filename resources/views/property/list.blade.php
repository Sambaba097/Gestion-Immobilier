@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Ajouter un Bien</h1>

        @if ($errors->any())
            <div class="mb-6">
                <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('propertie.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nom -->
            <div class="mb-4">
                <label for="nom" class="block text-gray-700 font-medium mb-2">Nom du bien</label>
                <input type="text" id="nom" name="nom" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400" value="{{ old('nom') }}" required>
            </div>

            <!-- Catégorie -->
            <div class="mb-4">
                <label for="category" class="block text-gray-700 font-medium mb-2">Catégorie</label>
                <input type="text" id="category" name="category" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400" value="{{ old('category') }}" required>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-2">Image du bien</label>
                <input type="file" id="image" name="image" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400" accept="image/*" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400" required>{{ old('description') }}</textarea>
            </div>

            <!-- Adresse -->
            <div class="mb-4">
                <label for="adresse" class="block text-gray-700 font-medium mb-2">Adresse</label>
                <input type="text" id="adresse" name="adresse" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400" value="{{ old('adresse') }}" required>
            </div>

            <!-- Statut -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">Statut</label>
                <select id="status" name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-400" required>
                    <option value="" disabled selected>-- Sélectionnez un statut --</option>
                    <option value="libre" {{ old('status') === 'libre' ? 'selected' : '' }}>Libre</option>
                    <option value="occupé" {{ old('status') === 'occupé' ? 'selected' : '' }}>Occupé</option>
                </select>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Ajouter le Bien
                </button>
            </div>
        </form>
    </div>
</div>
@endsection