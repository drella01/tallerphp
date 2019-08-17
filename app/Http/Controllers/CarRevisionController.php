<?php

namespace App\Http\Controllers;

use App\CarRevision;
use App\Revision;
use App\Car;
use Illuminate\Http\Request;

class CarRevisionController extends Controller
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
        $cars = Car::with('revisions')->get();
        return $cars;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        $revisions = Revision::all();
        return view('revision.create', compact('cars', 'revisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revision = CarRevision::create($request->all());
        return 'revisión hecha el día '.$revision->date;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarRevision  $carRevision
     * @return \Illuminate\Http\Response
     */
    public function show(CarRevision $carRevision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarRevision  $carRevision
     * @return \Illuminate\Http\Response
     */
    public function edit(CarRevision $carRevision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarRevision  $carRevision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarRevision $carRevision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarRevision  $carRevision
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarRevision $carRevision)
    {
        //
    }
}
