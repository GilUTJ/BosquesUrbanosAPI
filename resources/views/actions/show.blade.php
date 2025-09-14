<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Parque</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4 fw-bold text-success text-center">Parque {{$parque['data']['id']}}</h1>

    <div class="card shadow-lg border-0 rounded-3 p-4">
        <div class="row g-4 align-items-center">

            <!-- Imagen -->
            <div class="col-md-5 text-center">
                @if(!empty($parque['data']['park_img_uri']))
                    <img src="https://azuritaa33.sg-host.com/storage/{{ $parque['data']['park_img_uri'] }}"
                         alt="{{ $parque['data']['park_name'] }}"
                         class="img-fluid rounded shadow-sm border"
                         style="max-height: 300px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-success bg-opacity-25 text-success fw-bold rounded" style="height: 300px;">
                        Sin imagen
                    </div>
                @endif
            </div>

            <!-- Detalles -->
            <div class="col-md-7">
                <h3 class="text-success fw-bold mb-3">{{ $parque['data']['park_name'] ?? 'N/A' }}</h3>
                <span class="badge bg-success bg-opacity-75 mb-3">
                    {{ $parque['data']['park_abbreviation'] ?? 'N/A' }}
                </span>

                <div class="list-group list-group-flush">
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="fw-bold text-success">Dirección:</span>
                        <span>{{ $parque['data']['park_address'] ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="fw-bold text-success">Ciudad:</span>
                        <span>{{ $parque['data']['park_city'] ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="fw-bold text-success">Estado:</span>
                        <span>{{ $parque['data']['park_state'] ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="fw-bold text-success">Código Postal:</span>
                        <span>{{ $parque['data']['park_zip_code'] ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="fw-bold text-success">Latitud:</span>
                        <span>{{ $parque['data']['park_latitude'] ?? 'N/A' }}</span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="fw-bold text-success">Longitud:</span>
                        <span>{{ $parque['data']['park_longitude'] ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 d-flex gap-2">
    <a href="{{ route('parques.edit', ['id'=>$parque['data']['id']]) }}" class="btn btn-warning text-white">Actualizar</a>
    <a href="{{ route('parques.index') }}" class="btn btn-secondary">Volver a la lista</a>
</div>


</div>

</body>
</html>
