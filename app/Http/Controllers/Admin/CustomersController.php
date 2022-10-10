<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerCreateRequest;

use App\Models\Admin\AdminSettings;
use App\Http\Controllers\Controller;
use App\Models\Admin\Accounts;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Customers;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Customers::orderby('id')->paginate(PAGINATE_COUNT);

        return view('admin.customers.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.customers.create');
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
        DB::beginTransaction();

        try {

            $com_code = auth('admin')->user()->com_code;

            $checkExist = Customers::where(['name' => $request->name, 'com_code' => $com_code])->get();


            ////////// copy paste from accountcontroller 
            if ($checkExist->count() != 0) {

                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الحساب مسجل من قبل'])
                    ->withInput();
            }


            // تاني حاجة هو عاوز ال account number يكون نفس قيمة ال id  لنفس الشركة

            $get_id_of_same_company = Customers::where('com_code', $com_code)->get();


            if (empty($get_id_of_same_company)) {
                $customer_code = 1;

                $request->request->add(['customer_code' => $customer_code]);
            } else {
                $max_id = Customers::max('id');

                $customer_code = $max_id + 1;
                $request->request->add(['customer_code' => $customer_code]);
            }




            if ($request->start_balance_status == 1) {
                //credit
                $request->start_balance = $request->start_balance * (-1);
            } elseif ($request->start_balance_status == 2) {
                //debit
                $request->start_balance = $request->start_balance;
                if ($request->start_balance < 0) {
                    $request->start_balance = $request->start_balance * (-1);
                }
            } elseif ($request->start_balance_status == 3) {
                //balanced
                $request->start_balanc = 0;
            } else {
                $request->start_balance_status  = 3;
                $request->start_balanc = 0;
            }

            $customer_parent_account_number = AdminSettings::where('com_code', auth('admin')->user()->com_code)->first();


            $request->request->add(['com_code' => $com_code, 'added_by' => auth('admin')->user()->id, 'date' => now(), 'account_number' => $customer_parent_account_number->customer_parent_account_number]);



            Customers::create($request->except('_token'));
            ///////////////// finish customer insert ///////////////////




            $com_code = auth('admin')->user()->com_code;

            $checkExist = Accounts::where(['name' => $request->name, 'com_code' => $com_code])->get();



            if ($checkExist->count() != 0) {

                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الحساب مسجل من قبل'])
                    ->withInput();
            }


            // تاني حاجة هو عاوز ال account number يكون نفس قيمة ال id  لنفس الشركة

            $get_id_of_same_company = Accounts::where('com_code', $com_code)->get();




            if (!$request->is_parent == 0) {
                # code...
                $request->parent_account_number == null;
            }



            if ($request->start_balance_status == 1) {
                //credit
                $request->start_balance = $request->start_balance * (-1);
            } elseif ($request->start_balance_status == 2) {
                //debit
                $request->start_balance = $request->start_balance;
                if ($request->start_balance < 0) {
                    $request->start_balance = $request->start_balance * (-1);
                }
            } elseif ($request->start_balance_status == 3) {
                //balanced
                $request->start_balanc = 0;
            } else {
                $request->start_balance_status  = 3;
                $request->start_balanc = 0;
            }


            $request->request->add(['com_code' => $com_code, 'added_by' => auth('admin')->user()->id, 'date' => now(), 'other_table_FK' => $customer_code, 'account_type' => 3/* مؤقتا سيبوه ثابت */, 'is_archived' => $request->active]);

            Accounts::create($request->except('_token'));






            DB::commit();

            return redirect()->route('Customers.create');
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();

            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $com_code = auth()->user()->com_code;
        $data = Customers::where(['id' => $id, 'com_code' => $com_code])->first();


        return view('admin.customers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::beginTransaction();


        try {
        

            $data = Customers::where(['id'=>$id , 'com_code'=>auth('admin')->user()->com_code])->first();
                

            

            // ملحوظة هامة لو هنستخدم empty function  فمش بنكتب كلمة get بعد ال where
            if ($data->count() ==null) {
                return redirect()->route('Customers.index')->with(['error' => 'عفوا غير قادر علي الوصول الي البيانات المطلوبة !!']);
              }

              $request->request->add(['updated_by'=>auth('admin')->user()->id]);
           

              $data->update($request->except(['_token','_method']));
              ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////



              // not we use where without get()
              $data_account = Accounts::where(['com_code'=>auth('admin')->user()->com_code,'other_table_FK'=>$data->customer_code , 'account_number'=>$data->account_number]);



              $request->request->add(['updated_by'=>auth('admin')->user()->id]);
               $data_account->update($request->except(['_token','_method','address','active']));


            DB::commit();

            return redirect()->route('Customers.edit',$id);
        } catch (\Exception $e) {
            //throw $th;

            return $e->getMessage();

            DB::rollback();
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // حذف العميل
        $customers = Customers::findorfail($id);

        $customers->delete();

        // حذف الحساب
        $accounts = Accounts::where('other_table_FK', $id);

        $accounts->delete();


        session()->flash('delete', 'تم حذف الوحدة بنجاح');
        return redirect()->route('Customers.index');
    }
}
