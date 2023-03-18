@extends('layouts.app')
@section('content')
    <div class="container">
        @empty(!$capacitaciones)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Sillas</th>
                        <th scope="col">Fecha inicio</th>
                        <th scope="col">Fecha fin</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capacitaciones as $capacitacione)
                        <tr>
                            <th scope="row">{{ $capacitacione->id }} </th>
                            <td>{{ $capacitacione->name }}</td>
                            <td>{{ $capacitacione->places }}</td>
                            <td>{{ $capacitacione->start_date }}</td>
                            <td>{{ $capacitacione->end_date }}</td>
                            <td class="d-flex flex-column">
                                <form method="POST" action="{{ route('reservas.store', $capacitacione->id) }}">
                                    @csrf

                                    <button type="submit" class="btn btn-primary">Reservar</button>
                                </form>
                                @inject('name', 'App\Services\Admin')
                                @if ($name->isAdmin())
                                    <form method="POST" action="{{ route('capacitaciones.destroy', $capacitacione) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger mt-1">Borrar</button>
                                    </form>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            No hay Capacitaciones de momento
        @endempty



    </div>
@endsection
