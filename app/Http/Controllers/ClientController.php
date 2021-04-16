<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'names' => 'required|max:100|min:5',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|unique:clients|max:255',
            'address' => 'required',
        ]);

        
        $client = new Client;
        $client->names = $request->names;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;

        if($client->save()){
            return redirect()->route('clients');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'names' => 'required|max:100|min:5',
            'phone' => 'required|numeric|min:10',
            'email' => 'required|unique:clients,id,'.$id.'|max:255',
            'address' => 'required',
        ]);

        $client = Client::find($id);
        
        $client->names = $request->names;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;

        if($client->save()){
            return redirect()->route('clients');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Client::destroy($id)){
            return redirect()->route('clients');
        }

        return back();
    }
}
