@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- @dump($reservas) --}}
        @empty(!$reservas)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Fecha fin</th>
                        {{-- <th scope="col">Acciones</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>
                                {{ $reserva->id }}
                            </td>
                            <td>
                                {{ $reserva->name }}
                            </td>
                            <td>
                                {{ $reserva->start_date }}
                            </td>
                            <td>
                                {{ $reserva->end_date }}
                            </td>
                            {{-- <td>
                                <form method="POST" action="{{ route('reservas.destroy', $reserva) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger mt-1">Borrar</button>
                                </form>

                            </td> --}}

                        </tr>
                    @endforeach
                </tbody>

            </table>
        @else
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> No tienes capacitaciones reservadas </div>
                </div>
                <div class="card-body">

                    <a href="{{ route('capacitaciones.index') }}"> Ir a reservar una capacitaciones</a>
                </div>
            </div>
        @endempty

    </div>

@endsection
