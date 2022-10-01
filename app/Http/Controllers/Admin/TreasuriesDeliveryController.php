<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Treasuries_delivery;
use App\Models\Admin\Treasuries;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddTreasuireDeliveryRequest;
use Illuminate\Http\Request;

class TreasuriesDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTresuire_delivery($id)
    {
        //

        $data = Treasuries::select('id', 'name')->where('id', $id)->first();



        $Treasuries = Treasuries::select('id', 'name')->where(['com_code' => auth('admin')->user()->com_code, 'active' => 1])->get();
        return view('admin.treasuire_delivery.create', compact('data', 'Treasuries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddTreasuireDeliveryRequest $request)
    {
        //
        try {



            // $checkExist = Treasuries_delivery::where('treasuries_id',$request->trusire_id)->where('treasuries_can_delivery',$request->treasuries_can_delivery_id)->where('com_code',auth('admin')->user()->com_code)->get();

            $checkExist = Treasuries_delivery::where(['treasuries_id' => $request->trusire_id, 'treasuries_can_delivery' => $request->treasuries_can_delivery_id, 'com_code' => auth('admin')->user()->com_code])->get();

          
    
            if ($checkExist != null) {
                session()->flash('exist', ' هذه الخزنة موجودة مسبقا');
                return redirect()->route('Treasures.show',$request->trusire_id);
            } else {
                $Treasuries_delivery = new Treasuries_delivery();

                $Treasuries_delivery->treasuries_id = $request->trusire_id;
                $Treasuries_delivery->treasuries_can_delivery = $request->treasuries_can_delivery_id;
                $Treasuries_delivery->added_by = auth('admin')->user()->id;
                $Treasuries_delivery->com_code = auth('admin')->user()->com_code;

                $Treasuries_delivery->save();

                session()->flash('add', ' تم إضافة خزينة فرعية بنجاح ');
                return redirect()->route('Treasures.show',$request->trusire_id);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Treasuries_delivery  $treasuries_delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Treasuries_delivery $treasuries_delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Treasuries_delivery  $treasuries_delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Treasuries_delivery $treasuries_delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Treasuries_delivery  $treasuries_delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Treasuries_delivery $treasuries_delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Treasuries_delivery  $treasuries_delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treasuries_delivery $treasuries_delivery)
    {
        //
    }
}
