<?php

namespace App\Http\Controllers;

use App\Client;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Events\ClientRegistered;
use App\Notifications\Revision;
use App\Mail\Welcome;

class ClientsController extends Controller
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
        $clients = Client::with('cars')
                    ->orderBy('id')
                    ->paginate(5);

        return view('clients.index', compact('clients'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->isAdmin()) {
          return redirect()->route('users.create');
        } else {
          return view('clients.create');
        }
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
        $client = Client::create($request->all());
        auth()->user()->client_id = $client->id;
        auth()->user()->update();
        event(new ClientRegistered($client));
        $client->notify(new Revision($client));
        return redirect()->route('clients.index')
                        ->with('info', 'Client '.$client->id.' created');
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return redirect()->route('clients.index')->with('info', 'Client '.$client->name.' updated');
    }

    /**
     * Remove the specifie;d resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        if ($client->cars->isEmpty()){
          $client->delete();
          return back()->with('info', 'Client '.$client->name.' deleted');
        }
        return back()->with('info', 'Client not deleted. '.$client->name.
                            ' has '.$client->cars->count().' cars');
    }
}
