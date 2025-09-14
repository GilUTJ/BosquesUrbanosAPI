<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Parque</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-6 py-10">

  <!-- Mensaje de éxito -->
  @if(session('ok'))
    <div class="p-4 mb-6 text-sm text-green-800 rounded-lg bg-green-100 shadow" role="alert">
      ✅ {{ session('ok') }}
    </div>
  @endif

  <!-- Errores -->
  @if($errors->any())
    <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-100 shadow" role="alert">
      <ul class="list-disc list-inside">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Tarjeta del formulario -->
  <div class="bg-white shadow-md rounded-2xl p-8 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-green-700 mb-6 text-center">🌳 Crear Parque</h1>

    <form action="{{ route('parques.store') }}" method="POST" class="space-y-5">
      @csrf

      <!-- Nombre -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Nombre del Parque</label>
        <input type="text" name="park_name" value="{{ old('park_name') }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required maxlength="100">
      </div>

      <!-- Abreviación -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Abreviación</label>
        <input type="text" name="park_abbreviation" value="{{ old('park_abbreviation') }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required maxlength="10">
      </div>

      <!-- URL Imagen -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">URL de la Imagen</label>
        <input type="url" name="park_img_url" value="{{ old('park_img_url') }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
      </div>

      <!-- Dirección -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Dirección</label>
        <input type="text" name="park_address" value="{{ old('park_address') }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required maxlength="150">
      </div>

      <!-- Ciudad y Estado -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block mb-1 font-medium text-gray-700">Ciudad</label>
          <input type="text" name="park_city" value="{{ old('park_city') }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
        </div>
        <div>
          <label class="block mb-1 font-medium text-gray-700">Estado</label>
          <input type="text" name="park_state" value="{{ old('park_state') }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required maxlength="100">
        </div>
      </div>

      <!-- Código Postal -->
      <div>
        <label class="block mb-1 font-medium text-gray-700">Código Postal</label>
        <input type="number" name="park_zip_code" value="{{ old('park_zip_code') }}"
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
      </div>

      <!-- Latitud y Longitud -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block mb-1 font-medium text-gray-700">Latitud</label>
          <input type="text" name="park_latitude" value="{{ old('park_latitude') }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
        </div>
        <div>
          <label class="block mb-1 font-medium text-gray-700">Longitud</label>
          <input type="text" name="park_longitude" value="{{ old('park_longitude') }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:outline-none" required>
        </div>
      </div>

      <!-- Botones -->
      <div class="flex justify-end gap-3 pt-4">
        <a href="{{ route('parques.index') }}"
           class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Cancelar</a>
        <button type="submit"
          class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">Guardar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
