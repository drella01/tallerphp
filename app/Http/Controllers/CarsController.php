<?php

namespace App\Http\Controllers;

use App\Car;
use App\Client;
use App\Jobs\TestJob;
use Illuminate\Http\Request;
use Exception;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('roles:admin,user',['except' =>['index','show']]);
    }

    public function index()
    {
        if(!auth()->user()->hasRoles(['admin','user'])){
            $cars = Car::all()->where('client_id',auth()->user()->client_id);
        } else{
            $cars = Car::all()->sortBy('id');
            $client = Client::findOrFail(183);
            TestJob::dispatch($client);
        }
        return view ('cars.index', compact('cars') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('cars.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $car = Car::create($request->all());

        return redirect()->route('cars.index')
                        ->with('info', 'New car added with register '.$car->registration);

      } catch (Exception $e) {
        return 'Cagada de sql '.$e->getMessage();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //$car = Car::findOrFail($id);
        $facturas = $car->facturas;

        return view('cars.show', compact('car', 'facturas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
