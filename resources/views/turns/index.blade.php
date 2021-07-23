@extends('layouts.app')

@section('title', 'Turnos')

@section('content')
<h1>Bienvenido a la reserva de turnos</h1>
<div class="d-inline-flex p-2 bd-highlight">
    @foreach ($turns as $turn)
    <div class="card mr-2">
        <div class="card-header">
            {{ $turn['days'] }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Turnos disponibles: {{ $turn['total'] }}</h5>
            <form action="{{ route('turns.loadData', [strtolower($turn['days']), strtolower($student->slug)]) }}" method="POST">
                @csrf
                <input type="hidden" name="days" value="{{ strtolower($turn['days']) }}">
                <input type="hidden" name="student_id" value="{{ strtolower($student->slug) }}">
                <button type="submit" class="btn btn-primary">Ver detalles</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection
