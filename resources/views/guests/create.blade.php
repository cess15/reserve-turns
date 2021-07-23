@extends('layouts.app')
@section('title', 'Invitados')
@section('content')
    @if(session('message'))
    <div class="row">
        <div class="col">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>Éxito</h5>
                <ul>
                    <li>{{ session('message') }}</li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    <form action="{{ route('guests.store', $reservation->id) }}" method="POST">
        @csrf
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombres">
            @error('name')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido paterno</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ingrese apellido paterno">
            @error('lastname')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mothers_lastname" class="form-label">Apellido materno</label>
            <input type="text" class="form-control" id="mothers_lastname" name="mothers_lastname" placeholder="Ingrese apellido materno">
            @error('mothers_lastname')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar invitado</button>
    </form>
    <a href="{{ route('students.show', $reservation->student->slug) }}" class="btn btn-danger">Salir sin guardar</a>
@endsection
