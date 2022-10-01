<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Uoms;
use Illuminate\Http\Request;

class UomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Uoms::where('com_code',auth('admin')->user()->id)->orderby('id')->paginate(PAGINATE_COUNT);



        return view('admin.inv_uom.index',compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Uoms  $uoms
     * @return \Illuminate\Http\Response
     */
    public function show(Uoms $uoms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Uoms  $uoms
     * @return \Illuminate\Http\Response
     */
    public function edit(Uoms $uoms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Uoms  $uoms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uoms $uoms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Uoms  $uoms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uoms $uoms)
    {
        //
    }
}
