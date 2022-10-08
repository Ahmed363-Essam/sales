<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Accounts;
use App\Models\Admin\Accounts_types;
use App\Http\Requests\AccountsRequestUpdateRequest;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    
        $data = Accounts::where('com_code',auth('admin')->user()->com_code)->orderby('id')->paginate(PAGINATE_COUNT);


        return view('admin.accounts.index',compact('data'));
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
     * @param  \App\Models\Admin\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Accounts::findorfail($id);
        $account_types = Accounts_types::all();
        $parent_accounts = Accounts::where(['is_parent'=>1,'com_code'=>auth('admin')->user()->com_code])->get();


        return view('admin.accounts.edit',compact('data','account_types','parent_accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(AccountsRequestUpdateRequest $request,  $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //

        $Accounts = Accounts::findorfail($id);

        $Accounts->delete();


        session()->flash('delete','تم حذف الوحدة بنجاح');
        return redirect()->route('Accounts.index');
    }
}
