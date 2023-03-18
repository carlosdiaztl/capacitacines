@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Que deseas hacer hoy?</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex flex-column align-items-center">

                            @inject('name', 'App\Services\Admin')
                            @if ($name->isAdmin())
                                <a href="{{ route('capacitaciones.create') }}" class="col-6 btn btn-primary m-2">Crear nueva
                                    capacitacion</a>
                            @endif

                            <a href="{{ route('capacitaciones.index') }}" class="col-6 btn btn-primary m-2">Reservar una
                                capacitacion</a>
                            <a href="{{ route('reservas.index') }}" class="col-6 btn btn-primary m-2">Ver tus
                                reservas</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
