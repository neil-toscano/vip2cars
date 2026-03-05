@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header" style="background-color: #1B3A6B;">
                <h5 class="mb-0 text-white">
                    <i class="bi bi-eye me-2"></i>Detalle del vehículo
                </h5>
            </div>
            <div class="card-body">

                <h6 class="fw-bold mb-3" style="color: #1B3A6B;">
                    <i class="bi bi-car-front me-2"></i>Datos del vehículo
                </h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="text-muted small">Placa</label>
                        <p class="fw-bold">{{ $vehicle->plate }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Marca</label>
                        <p class="fw-bold">{{ $vehicle->brand }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Modelo</label>
                        <p class="fw-bold">{{ $vehicle->model }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Año de fabricación</label>
                        <p class="fw-bold">{{ $vehicle->manufacture_year }}</p>
                    </div>
                </div>

                <hr>

                <h6 class="fw-bold mb-3" style="color: #1B3A6B;">
                    <i class="bi bi-person me-2"></i>Datos del cliente
                </h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small">Nombre completo</label>
                        <p class="fw-bold">{{ $vehicle->client->first_name }} {{ $vehicle->client->last_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Nro. Documento</label>
                        <p class="fw-bold">{{ $vehicle->client->document_number }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Correo</label>
                        <p class="fw-bold">{{ $vehicle->client->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small">Teléfono</label>
                        <p class="fw-bold">{{ $vehicle->client->phone }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('vehicles.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Volver
                    </a>
                    <a href="{{ route('vehicles.edit', $vehicle) }}" class="btn btn-primary">
                        <i class="bi bi-pencil me-1"></i>Editar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection