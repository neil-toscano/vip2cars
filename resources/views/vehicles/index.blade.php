@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0" style="color: #1B3A6B;">
        <i class="bi bi-car-front me-2"></i>Vehículos registrados
    </h4>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>Nuevo vehículo
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('vehicles.index') }}" class="row g-2">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control"
                    placeholder="Buscar por placa, marca, modelo o cliente..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">
                    <i class="bi bi-search me-1"></i>Buscar
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Cliente</th>
                        <th>Documento</th>
                        <th>Teléfono</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicles as $vehicle)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge bg-secondary">{{ $vehicle->plate }}</span></td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->manufacture_year }}</td>
                        <td>{{ $vehicle->client->first_name }} {{ $vehicle->client->last_name }}</td>
                        <td>{{ $vehicle->client->document_number }}</td>
                        <td>{{ $vehicle->client->phone }}</td>
                        <td class="text-center">
                            <a href="{{ route('vehicles.show', $vehicle) }}"
                                class="btn btn-sm btn-outline-info" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}"
                                class="btn btn-sm btn-outline-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('vehicles.destroy', $vehicle) }}" 
                                method="POST" 
                                class="d-inline form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">
                            <i class="bi bi-inbox me-2"></i>No se encontraron vehículos.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3 d-flex justify-content-center align-items-center">
    <!-- <small class="text-muted">
        Mostrando {{ $vehicles->firstItem() ?? 0 }} - {{ $vehicles->lastItem() ?? 0 }}
        de {{ $vehicles->total() }} registros
    </small> -->
    {{ $vehicles->links('pagination::bootstrap-5') }}
</div>


<script>
    const formularios = document.querySelectorAll('.form-eliminar');

    formularios.forEach(formulario => {
        formulario.addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará el vehículo y los datos del cliente permanentemente.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1B3A6B',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Logrado!',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@endsection


