<?php

namespace App\Http\Controllers;

use App\Factura;
use App\WorkOrder;
use App\Car;
use App\Concept;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        $facturas = Factura::with('workorders')->get();
        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        return view('facturas.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = Factura::create($request->all());

        return redirect()->route('facturas.edit', $factura->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::findOrFail($id);
        return view('facturas.show', compact('factura'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $concepts = Concept::all();
        $workorders = WorkOrder::where('car_id', $factura->car_id)->get();
        return view('facturas.edit', compact('factura', 'concepts', 'workorders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);
        if ($request->concept_id) {
            $workorder = WorkOrder::create([
                'car_id' => $factura->car_id,
                'date' => $factura->date,
                'concept_id' => $request->concept_id,
                'units' => $request->units,
            ]);
            $workorder->total($workorder->units);
            $workorder->discount = $workorder->total * ($request->discount/100);
            $workorder->update();
            $factura->workorders()->attach($workorder->id);
            return back()->with('info', 'line added');
        }
        elseif(WorkOrder::findOrFail($request->workorder_id)){
            $workorder = WorkOrder::findOrFail($request->workorder_id);
            $factura->workorders()->attach($workorder->id);
            return back()->with('info', 'line added');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
