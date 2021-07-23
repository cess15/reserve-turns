@extends('layouts.app')
@section('title', 'Student')
@section('content')
    <h1>Por favor, siga los siguientes pasos</h1>
    <div class="card text-white bg-success mb-3">
        <div class="card-header">
            Reservar
        </div>
        <div class="card-body">
            <h5 class="card-title">Siga las recomendaciones</h5>
            <p class="card-text">
                Necesitamos verificar su número de identificación para comprobar si esta autorizado
            </p>

            @if(session('message'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i>Error</h5>
                        <ul>
                            <li>{{ session('message') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        <label for="identification">N° Identificación</label>
                    </div>
                    <div class="col-md-5">
                        <form action="{{ route('students.validate') }}" method="POST">
                            @csrf
                            <input type="text" id="identification" name="identification" class="form-control" maxlength="10">
                            @error('identification')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary my-2">Validar datos</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p class="card-text">
                <em>
                    Nota: Recuerde que debe pertenecer a la carrera de Sistemas y estar cursando el último semestre
                </em>
            </p>
        </div>
    </div>
@endsection
