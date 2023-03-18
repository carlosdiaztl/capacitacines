<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $reservas = auth()->user()->reservas;
        // dd($reservas);

        // $userid = auth()->user()->id;
        $capacitaciones = Reserva::whereHas('user', function ($query) {
            $query->where('id', auth()->user()->id);
        })->with('capacitacion')->get();

        $newcaps = array();

        foreach ($capacitaciones as $capacitacion) {
            // $event = $event->getRelations()['event'];

            array_push($newcaps, $capacitacion->getRelations()['capacitacion']);

            // dd($event);
        }
        $reservas = $newcaps;
        // dd($capacitaciones);


        return view('reservas.index', compact('reservas'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  $capacitacion_id)
    {
        $user_id = auth()->user()->id;
        $reserva = new Reserva();
        $reserva->user()->associate($user_id);
        $reserva->capacitacion()->associate($capacitacion_id);
        // dd($reserva);
        $reserva->save();
        // dd($reserva);
        return redirect()->back()->withSuccess('Se ha reservado su cupo con exito');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)

    {
        dd($reserva);
        //
    }
}
