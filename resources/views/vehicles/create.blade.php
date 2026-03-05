@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header" style="background-color: #1B3A6B;">
                <h5 class="mb-0 text-white">
                    <i class="bi bi-plus-circle me-2"></i>Registrar vehículo
                </h5>
            </div>
            <div class="card-body">
                <form id="vehicleForm" action="{{ route('vehicles.store') }}" method="POST">
                    @csrf

                    <h6 class="fw-bold mb-3" style="color: #1B3A6B;">
                        <i class="bi bi-car-front me-2"></i>Datos del vehículo
                    </h6>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Placa <span class="text-danger">*</span></label>
                            <input type="text" name="plate"
                                class="form-control @error('plate') is-invalid @enderror"
                                value="{{ old('plate') }}" placeholder="Ej: ABC-123">
                            @error('plate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Marca <span class="text-danger">*</span></label>
                            <input type="text" name="brand"
                                class="form-control @error('brand') is-invalid @enderror"
                                value="{{ old('brand') }}" placeholder="Ej: Toyota">
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Modelo <span class="text-danger">*</span></label>
                            <input type="text" name="model"
                                class="form-control @error('model') is-invalid @enderror"
                                value="{{ old('model') }}" placeholder="Ej: Corolla">
                            @error('model')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Año de fabricación <span class="text-danger">*</span></label>
                            <input type="number" name="manufacture_year"
                                class="form-control @error('manufacture_year') is-invalid @enderror"
                                value="{{ old('manufacture_year') }}" placeholder="Ej: 2022"
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
                                value="{{ old('first_name') }}" placeholder="Ej: Juan">
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Apellidos <span class="text-danger">*</span></label>
                            <input type="text" name="last_name"
                                class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}" placeholder="Ej: Pérez García">
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Nro. Documento <span class="text-danger">*</span></label>
                            <input type="text" name="document_number"
                                class="form-control @error('document_number') is-invalid @enderror"
                                value="{{ old('document_number') }}" placeholder="Ej: 12345678">
                            @error('document_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Correo <span class="text-danger">*</span></label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Ej: juan@gmail.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Teléfono <span class="text-danger">*</span></label>
                            <input type="text" name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" placeholder="Ej: 999888777">
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
                            <i class="bi bi-save me-1"></i>Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('vehicleForm').addEventListener('submit', function(e) {
        Swal.fire({
            title: 'Procesando registro',
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
