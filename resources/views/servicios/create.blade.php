<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Servicio — Taller Automotriz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .navbar { background: #e63946 !important; }
        .navbar-brand, .nav-link, .navbar-text { color: #fff !important; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .btn-guardar { background: #e63946; border: none; }
        .btn-guardar:hover { background: #c1121f; }
        .form-control:focus, .form-select:focus {
            border-color: #e63946;
            box-shadow: 0 0 0 0.2rem rgba(230,57,70,.25);
        }
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
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="mb-3">
                    <a href="{{ route('servicios.index') }}" class="text-decoration-none text-secondary">
                        &larr; Volver a la lista
                    </a>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Registrar Nuevo Servicio</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('servicios.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nombre" class="form-label fw-semibold">Nombre del servicio <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre"
                                    name="nombre"
                                    value="{{ old('nombre') }}"
                                    placeholder="Ej: Cambio de aceite"
                                    maxlength="100"
                                    required
                                >
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                                <textarea
                                    class="form-control @error('descripcion') is-invalid @enderror"
                                    id="descripcion"
                                    name="descripcion"
                                    rows="3"
                                    placeholder="Descripción detallada del servicio..."
                                >{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="precio" class="form-label fw-semibold">Precio (S/) <span class="text-danger">*</span></label>
                                    <input
                                        type="number"
                                        class="form-control @error('precio') is-invalid @enderror"
                                        id="precio"
                                        name="precio"
                                        value="{{ old('precio') }}"
                                        placeholder="0.00"
                                        step="0.01"
                                        min="0"
                                        required
                                    >
                                    @error('precio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="duracion_estimada" class="form-label fw-semibold">Duración estimada (min) <span class="text-danger">*</span></label>
                                    <input
                                        type="number"
                                        class="form-control @error('duracion_estimada') is-invalid @enderror"
                                        id="duracion_estimada"
                                        name="duracion_estimada"
                                        value="{{ old('duracion_estimada') }}"
                                        placeholder="30"
                                        min="1"
                                        required
                                    >
                                    @error('duracion_estimada')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="estado" class="form-label fw-semibold">Estado <span class="text-danger">*</span></label>
                                <select
                                    class="form-select @error('estado') is-invalid @enderror"
                                    id="estado"
                                    name="estado"
                                    required
                                >
                                    <option value="" disabled {{ old('estado') ? '' : 'selected' }}>Selecciona un estado</option>
                                    <option value="Activo" {{ old('estado') === 'Activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="Inactivo" {{ old('estado') === 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    <option value="Pendiente" {{ old('estado') === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                </select>
                                @error('estado')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-guardar btn-danger text-white fw-semibold">
                                    Guardar Servicio
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
