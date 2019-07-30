<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Client;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth', ['except'=>['index','create', 'store']]);
    }

    public function index()
    {
          $users = User::with('roles')->orderBy('id')->get();
          return view('users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * HEMOS ELIMINADO Request $request y sustituido por request() 2019-07-30
     */
    public function store()
    {
        $user = User::create(request()->all());
        $user->isClient();
        $client = Client::pluck('email', 'id')->intersect($user->email);
        if ($client->count()){
            $user->client_id = $client->keys()->first();
            $user->save();
            return redirect()->route('clients.index')->with('info', 'User created');
        } else {
            return $user;
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
        //
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
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('info', 'User '.$user->name.' erased');
    }
}
