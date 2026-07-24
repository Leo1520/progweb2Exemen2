<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Taller Automotriz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .navbar { background: #e63946 !important; }
        .navbar-brand, .nav-link, .navbar-text { color: #fff !important; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .badge-activo { background-color: #28a745; }
        .badge-inactivo { background-color: #6c757d; }
        .badge-pendiente { background-color: #ffc107; color: #000; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold">&#128663; Taller Automotriz</a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="navbar-text">
                    Hola, <strong>{{ auth()->user()->name }}</strong>
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">Lista de Servicios</h4>
                    <a href="{{ route('servicios.create') }}" class="btn btn-danger">
                        + Nuevo Servicio
                    </a>
                </div>

                @if ($servicios->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <p class="fs-5">No hay servicios registrados aún.</p>
                        <a href="{{ route('servicios.create') }}" class="btn btn-danger">Registrar el primero</a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Servicio</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Duración (min)</th>
                                    <th>Estado</th>
                                    <th>Registrado por</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servicios as $servicio)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $servicio->nombre }}</td>
                                        <td>{{ $servicio->descripcion ?? '—' }}</td>
                                        <td>S/ {{ number_format($servicio->precio, 2) }}</td>
                                        <td>{{ $servicio->duracion_estimada }}</td>
                                        <td>
                                            @php $e = strtolower($servicio->estado); @endphp
                                            <span class="badge
                                                @if($e === 'activo') badge-activo
                                                @elseif($e === 'inactivo') badge-inactivo
                                                @else badge-pendiente
                                                @endif
                                            ">{{ $servicio->estado }}</span>
                                        </td>
                                        <td>{{ $servicio->user->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
