<?php

namespace App\Http\Controllers;

use App\WorkOrder;
use App\Car;
use App\Concept;
use Illuminate\Http\Request;

class WorkOrdersController extends Controller
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
        $workOrders = WorkOrder::with(['concept', 'car'])
                      ->orderByDesc('date')// oldest tambien rula
                      ->paginate(8);//->get();
        return view('workorders.index', compact('workOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $concepts = Concept::all();
        $cars = Car::all();
        /*$discounts = array();
        for ($i=0; $i <=100 ; $i+=5) {
          $discounts[]=$i;
        } el array aquí en vez de en el frontend*/
        return view('workorders.create', compact('cars', 'concepts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $order = WorkOrder::create($request->all());
          $order->total = $order->total($order->units);
          $order->update();
          return redirect()->route('workorders.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = WorkOrder::findOrFail($id);
        return view('workorders.edit', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = WorkOrder::findOrFail($id);
        $concepts = Concept::all();
        $cars = Car::all();
        //return view('workorders.edit', compact('order', 'cars', 'concepts'));
        return dd($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkOrder $workOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        //
    }
}
