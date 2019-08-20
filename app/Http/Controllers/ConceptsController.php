<?php

namespace App\Http\Controllers;

use App\Concept;
use App\Http\Requests\CreateConceptRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateConceptRequest;

class ConceptsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin',['except' =>['index','show']]);
    }

    public function index()
    {
        $concepts = Concept::orderBy('id')->paginate(5);

        return view('concepts.index', compact('concepts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('concepts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateConceptRequest $request)
    {
        $concept = (new Concept)->fill($request->all());
        //$concept = Concept::create(request()->all());
        $concept->image = request()->file('image')->store('public/images');
        $concept->save();
        return redirect()->route('concepts.index')
                ->with('info', $concept->concept.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {

    }/*

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {//
        $concept = Concept::findOrFail($id);
        return view('concepts.edit', compact('concept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConceptRequest $request, $id)
    {
        $concept = Concept::findOrFail($id);
        $concept->price = $request->price;
        if($request->hasFile('image')){
            $concept->image = $request->file('image')->store('public/images');
        }
        $concept->update();
        return redirect()->route('concepts.index')->with('info', 'Concept updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concept  $concept
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concept = Concept::findOrFail($id);
        if ($concept->workOrders->count()){
            return back()->with('info', 'No se puede borrar. Tiene órdenes de trabajo');
        }else{
            $concept->delete();
            return redirect()->route('concepts.index')->with('info', 'Concepto borrado');
        }
    }
}
