<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use App\Models\Client;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meters = Meter::all();
        return view('meter.index', compact('meters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('meter.create', compact('clients'));
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
            'client_id' => 'required',
            'meterlandupi' => 'required',
            'pipeline' => 'required',
        ]);

        
        $meter = new Meter;
        $meter->client_id = $request->client_id;
        $meter->meterlandupi = $request->meterlandupi;
        $meter->pipeline = $request->pipeline;

        if($meter->save()){
            return redirect()->route('meters');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function show(Meter $meter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $meter = Meter::find($id);
        return view('meter.edit', compact('meter', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'client_id' => 'required',
            'meterlandupi' => 'required',
            'pipeline' => 'required',
        ]);

        
        $meter = Meter::find($id);
        $meter->client_id = $request->client_id;
        $meter->meterlandupi = $request->meterlandupi;
        $meter->pipeline = $request->pipeline;

        if($meter->save()){
            return redirect()->route('meters');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meter  $meter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Meter::destroy($id)){
            return redirect()->route('meters');
        }

        return back();
    }
}
