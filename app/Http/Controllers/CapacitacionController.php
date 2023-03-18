<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CapacitacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $capacitaciones = Capacitacion::all();
        return view('capacitaciones.index', compact('capacitaciones'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('capacitaciones.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fecha =  $request['start_date'];
        $fecha_obj = DateTime::createFromFormat('Y-m-d\TH:i', $fecha);
        $fecha_obj->add(new DateInterval('PT50M'));
        $nueva_fecha = $fecha_obj->format('Y-m-d\TH:i');
        $request['end_date'] = $nueva_fecha;
        // dd($request->all());
        Capacitacion::create($request->all());

        // $capa = Capacitacion::first();
        // dd($capa);
        return redirect()->back()->withSuccess("Se ha creado la capacitacion {$request->name}");


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
    public function destroy(Capacitacion $capacitacione)
    {
        // dd($capacitacione);
        $capacitacione->delete();
        return redirect()->back()->withSuccess('se ha eliminado');
        //
    }
}
