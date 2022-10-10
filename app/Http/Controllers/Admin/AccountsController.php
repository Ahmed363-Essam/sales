<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Accounts;
use App\Models\Admin\Accounts_types;
use App\Http\Requests\AccountsRequestCreateRequest;
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


        $data = Accounts::where('com_code', auth('admin')->user()->com_code)->orderby('id')->paginate(PAGINATE_COUNT);


        return view('admin.accounts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $account_types = Accounts_types::where(['active' => 1, 'relatediternalaccounts' => 0])->get();
        $parent_accounts = Accounts::where(['is_parent' => 1, 'com_code' => auth('admin')->user()->com_code])->get();

        return view('admin.accounts.create', compact('account_types', 'parent_accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountsRequestCreateRequest $request)
    {
        //
        try {
            $com_code = auth('admin')->user()->com_code;
       
            $checkExist = Accounts::where(['name' => $request->name , 'com_code' => $com_code ])->get();


            
            if ( $checkExist->count() != 0 ) {
            
                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الحساب مسجل من قبل'])
                    ->withInput();
            }


            // تاني حاجة هو عاوز ال account number يكون نفس قيمة ال id  لنفس الشركة

            $get_id_of_same_company = Accounts::where('com_code', $com_code)->get();


            if (empty($get_id_of_same_company)) {
                $account_number = 1;

                $request->request->add(['account_number'=>$account_number]);
            } else {
                $max_id = Accounts::max('id');

                $account_number = $max_id + 1;
                $request->request->add(['account_number'=>$account_number]);
            }


            if (!$request->is_parent == 0) {
                # code...
                $request->parent_account_number == null;
            }
            


            if ($request->start_balance_status == 1) {
                //credit
                $request->start_balance = $request->start_balance * (-1);
              } 
              elseif ($request->start_balance_status == 2) {
                //debit
                $request->start_balance = $request->start_balance;
                if ($request->start_balance < 0) {
                    $request->start_balance = $request->start_balance* (-1);
                }
              }
               elseif ($request->start_balance_status == 3) {
                //balanced
                $request->start_balanc = 0;
              } 
              else {
                $request->start_balance_status  = 3;
                $request->start_balanc = 0;
              }


            $request->request->add(['com_code'=>$com_code,'added_by'=>auth('admin')->user()->id,'date'=>now(),'other_table_FK'=>null]);

            Accounts::create($request->except('_token'));


            return redirect()->route('Accounts.create')->with(['success' => 'لقد تم اضافة البيانات بنجاح']);




        } catch (\Exception $e) {
            //throw $th;

            return redirect()->back()
        ->with(['error' => 'عفوا حدث خطأ ما' . $e->getMessage()])
        ->withInput();
        }
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
        $parent_accounts = Accounts::where(['is_parent' => 1, 'com_code' => auth('admin')->user()->com_code])->get();


        return view('admin.accounts.edit', compact('data', 'account_types', 'parent_accounts'));
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
    public function destroy($id)
    {
        //

        $Accounts = Accounts::findorfail($id);

        $Accounts->delete();


        session()->flash('delete', 'تم حذف الوحدة بنجاح');
        return redirect()->route('Accounts.index');
    }
}
