<?php

namespace App\Http\Controllers\Admin;

use  App\Http\Controllers\Controller;
use App\Models\Admin\Accounts_types;
use Illuminate\Http\Request;

class AccountsTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Accounts_types::where('com_code',auth('admin')->user()->com_code)->orderby('id')->paginate(PAGINATE_COUNT);

        return view('admin.account_types.index',compact('data'));
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
     * @param  \App\Models\Admin\Accounts_types  $accounts_types
     * @return \Illuminate\Http\Response
     */
    public function show(Accounts_types $accounts_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Accounts_types  $accounts_types
     * @return \Illuminate\Http\Response
     */
    public function edit(Accounts_types $accounts_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Accounts_types  $accounts_types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accounts_types $accounts_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Accounts_types  $accounts_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accounts_types $accounts_types)
    {
        //
    }
}
