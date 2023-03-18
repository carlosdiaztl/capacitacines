@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('capacitaciones.store') }} " method="POST">
                    @csrf

                    <div class="form-row">
                        <label for="Nombre capacitacion">Nombre capacitacion</label>
                        <input class="form-control form-control-lg" type="text" name="name"
                            placeholder="Nombre capacitacion" value="{{ old('name') }}">
                    </div>
                    <div class="form-row">
                        <label for="cupos">Cupos</label>
                        <input class="form-control form-control-lg" type="number" name="places" placeholder="cupos"
                            value="{{ old('places') }}">
                    </div>

                    <div class="form-row">
                        <label for="start_date">start_date</label>
                        <input class="form-control form-control-lg" type="datetime-local" name="start_date"
                            placeholder="start_date" value="{{ old('start_date') }}">
                    </div>

                    <div class="form-row mt-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Crear capacitacion

                        </button>

                    </div>



                </form>

            </div>
        </div>

    </div>
@endsection
