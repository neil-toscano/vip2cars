@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header" style="background-color: #1B3A6B;">
                <h5 class="mb-0 text-white">
                    <i class="bi bi-pencil-square me-2"></i>Editar vehículo
                </h5>
            </div>
            <div class="card-body">
                <form  id="editVehicleForm" action="{{ route('vehicles.update', $vehicle) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <h6 class="fw-bold mb-3" style="color: #1B3A6B;">
                        <i class="bi bi-car-front me-2"></i>Datos del vehículo
                    </h6>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Placa <span class="text-danger">*</span></label>
                            <input type="text" name="plate"
                                class="form-control @error('plate') is-invalid @enderror"
                                value="{{ old('plate', $vehicle->plate) }}">
                            @error('plate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Marca <span class="text-danger">*</span></label>
                            <input type="text" name="brand"
                                class="form-control @error('brand') is-invalid @enderror"
                                value="{{ old('brand', $vehicle->brand) }}">
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Modelo <span class="text-danger">*</span></label>
                            <input type="text" name="model"
                                class="form-control @error('model') is-invalid @enderror"
                                value="{{ old('model', $vehicle->model) }}">
                            @error('model')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Año de fabricación <span class="text-danger">*</span></label>
                            <input type="number" name="manufacture_year"
                                class="form-control @error('manufacture_year') is-invalid @enderror"
                                value="{{ old('manufacture_year', $vehicle->manufacture_year) }}"
                                min="1900" max="{{ date('Y') }}">
                            @error('manufacture_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <h6 class="fw-bold mb-3" style="color: #1B3A6B;">
                        <i class="bi bi-person me-2"></i>Datos del cliente
                    </h6>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nombre <span class="text-danger">*</span></label>
                            <input type="text" name="first_name"
                                class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name', $vehicle->client->first_name) }}">
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellidos <span class="text-danger">*</span></label>
                            <input type="text" name="last_name"
                                class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name', $vehicle->client->last_name) }}">
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nro. Documento <span class="text-danger">*</span></label>
                            <input type="text" name="document_number"
                                class="form-control @error('document_number') is-invalid @enderror"
                                value="{{ old('document_number', $vehicle->client->document_number) }}">
                            @error('document_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Correo <span class="text-danger">*</span></label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $vehicle->client->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $vehicle->client->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('vehicles.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i>Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('editVehicleForm').addEventListener('submit', function(e) {
        Swal.fire({
            title: 'Procesando actualización',
            text: 'Por favor, espere un momento...',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
    });
</script>
@endsection