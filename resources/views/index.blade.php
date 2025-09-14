<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recursos API</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container mx-auto px-6 py-8">

    <div class="text-center mb-8">
        <h1 class="relative inline-block px-8 py-3 text-3xl font-bold text-white bg-green-700 rounded-lg shadow-md mb-6 text-center mx-auto">
        Lista de Parques en Jalisco
        </h1>
    </div>

    @if(isset($parque['data']))
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($parque['data'] as $park)

        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-green-200 hover:shadow-lg transition">

            <!-- Imagen del parque si existe -->
            @if(!empty($park['park_img_uri']))
                <img class="h-40 w-full object-cover"
                     src="https://azuritaa33.sg-host.com/storage/{{ $park['park_img_uri'] }}"
                     alt="{{ $park['park_name'] }}">
            @else
                <div class="h-40 w-full bg-green-100 flex items-center justify-center text-green-600">
                    <span class="font-semibold">Sin imagen</span>
                </div>
            @endif

            <!-- Contenido -->
            <div class="p-5">
                <h2 class="text-xl font-semibold text-gray-800">{{ $park['park_name'] ?? 'N/A' }}</h2>
                <p class="text-sm text-gray-500 mb-3">
                    Abreviación:
                    <span class="font-medium text-green-600">{{ $park['park_abbreviation'] ?? 'N/A' }}</span>
                </p>

                <!-- Botones -->
                <div class="flex items-center gap-2 mt-4">
                    <a href="{{ route('parques.show', ['id' => $park['id']]) }}"
                       class="px-3 py-1 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                       Ver detalles
                    </a>
                    <form action="{{ route('parques.destroy', ['id'=> $park['id']]) }}" method="POST"
                          onsubmit="return confirm('¿Estás seguro de que deseas eliminar este parque?');"
                          >
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition">
                            Eliminar
                        </button>
                    </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>
    @else
        <p class="text-gray-600">No hay recursos para mostrar.</p>
    @endif
</div>

<!-- Botón agregar -->
<div class="container mx-auto px-6 mt-10">

    <h3 class="text-xl font-semibold text-gray-700 mb-3">Agregar nuevo parque</h3>
    <a href="{{route('parques.create')}}"
       class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
       Agregar parque
    </a>
</div>

<br><br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
