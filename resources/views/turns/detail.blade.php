@extends('layouts.app')
@section('title', 'Turnos')
@section('content')
<div class="d-inline-flex p-2 bd-highlight">
    <div class="row">

        @foreach ($turns as $turn)
        <div class="card mr-2">
            <div class="card-header">
                {{ $turn->status ? 'Disponible' : 'No disponible' }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Hora: {{ $turn->hour }}</h5>
                <p class="card-text">{{ $turn->days }}</p>
                <form action="{{ route('reservations.store', [$turn->id, $student->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="turn_id" value="{{ $turn->id }}">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Reservar</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('reservations.guests', [$turn->id, $student->id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="turn_id" value="{{ $turn->id }}">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="row mt-2">
                        <div class="col">
                            <button type="submit" class="btn btn-success">Invitar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
