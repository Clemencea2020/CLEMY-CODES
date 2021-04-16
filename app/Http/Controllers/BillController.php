<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Setting;
use App\Models\Meter;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        return view('bill.index', compact('bills'));
    }

    public function waterprice()
    {
        $waterbill = Setting::where('name', 'water_unit_price')->first();
        return view('bill.waterbill', compact('waterbill'));
    }

    public function check(Request $request)
    {   
        $validated = $request->validate([
            'metercodeid' => 'required|exists:meters',
        ]);
        
        return redirect()->route('bills.pay', ['meter='. $request->metercodeid]);
    }

    public function pay(Request $request)
    {
        $meter = Meter::find($request->meter);
        if($meter == "") abort(404);

        $prevBill = Bill::where('client_id', $meter->client->id)->where('meter_id', $meter->metercodeid)->orderBy('id', 'DESC')->first();
        if($prevBill !="") {
            $previousreading = $prevBill->presentreading;
        } else {
            $previousreading = 0;
        }
        return view('bill.pay', compact('meter', 'previousreading'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'client_id' => 'required|numeric',
            'metercodeid' => 'required|numeric',
            'previousreading' => 'required|numeric',
        ]);

        $prevBill = Bill::where('client_id', $request->client_id)->where('meter_id', $request->metercodeid)->orderBy('id', 'DESC')->first();

        if($prevBill!="") {
            $prv = $prevBill->presentreading;
        } else {
            $prv = 0;
        }

        $validated = $request->validate([
            'presentreading' => 'required|numeric|gt:'.$prv,
        ]);

        $waterbill = Setting::where('name', 'water_unit_price')->first()->value;

        $bill = new Bill;
        $bill->meter_id = $request->metercodeid;
        $bill->client_id = $request->client_id;
        $bill->previousreading = $request->previousreading;
        $bill->presentreading = $request->presentreading;
        $bill->priceunit = $waterbill;

        $amount = ($request->presentreading - $request->previousreading) * $waterbill;
        $bill->amount = $amount;

        if($bill->save()){
            return redirect()->route('bills.my-bill', [$bill->id]);
        }

        return back();
    }

    public function mybill($id)
    {
        $bill = Bill::find($id);
        if($bill == null) abort(404);
        return view('bill.my-bill', compact('bill'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::find($id);
        if($bill == "") abort(404);

        return view('bill.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        if($bill == null) abort(404);

        $validated = $request->validate([
            'client_id' => 'required|numeric',
            'meter_id' => 'required|numeric',
            'previousreading' => 'required|numeric',
            'presentreading' => 'required|numeric|gt:previousreading',
        ]);

        $waterbill = Setting::where('name', 'water_unit_price')->first()->value;
        $bill->presentreading = $request->presentreading;
        $bill->priceunit = $waterbill;

        $amount = ($request->presentreading - $request->previousreading) * $waterbill;
        $bill->amount = $amount;

        if($bill->save()){
            $updateNextBill = Bill::where('id', '>', $bill->id)->orderBy('id', 'ASC')->first();
            if($updateNextBill != null) {
                $updateNextBill->previousreading = $bill->presentreading;

                $amount2 = ($request->presentreading - $updateNextBill->previousreading) * $waterbill;
                $updateNextBill->amount = $amount2;
                $updateNextBill->save();
            }

            return redirect()->route('bills');
        }

        return back();
    }

    public function waterBillUpdate(Request $request)
    {
        $validated = $request->validate([
            'priceunit' => 'required|numeric',
        ]);

        $update = Setting::where('name', 'water_unit_price')->first();
        $update->value = $request->priceunit;

        if($update->save()){
            return redirect()->route('water-price');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Bill::destroy($id)){
            return redirect()->route('bills');
        }

        return back();
    }
}
