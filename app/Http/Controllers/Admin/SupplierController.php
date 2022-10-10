<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Supplier;
use App\Models\Admin\Supplier_categories;
use App\Models\Admin\Accounts;

use App\Models\Admin\AdminSettings;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierCreateRequest;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $com_code = auth()->user()->com_code;

        $data = Supplier::orderby('id')->paginate(PAGINATE_COUNT);


        return view('admin.suppliers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $suppliers_categories = Supplier_categories::where(['com_code' => auth('admin')->user()->com_code, 'active' => 1])->get();


        return view('admin.suppliers.create', compact('suppliers_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierCreateRequest $request)
    {
        //
        
        DB::beginTransaction();
        try {

            $com_code = auth('admin')->user()->com_code;
            // تاني حاجة هو عاوز ال account number يكون نفس قيمة ال id  لنفس الشركة

            $get_id_of_same_company = Supplier::where('com_code', $com_code)->get();


            if (empty($get_id_of_same_company)) {
                $supplier_code = 1;

                $request->request->add(['supplier_code' => $supplier_code]);
            } else {
                $max_id = Supplier::max('id');

                $supplier_code = $max_id + 1;
                $request->request->add(['supplier_code' => $supplier_code]);
            }


            ///////////////////////////////////////////////



            $row = Accounts::where('com_code', $com_code)->get();


            if (empty($row)) {


                $account_number = 1;

                $request->request->add(['account_number' => $account_number]);
            } else {
                $max_id = Accounts::max('id');

                $account_number = $max_id ;
                $request->request->add(['account_number' => $account_number]);
            }






            ////////////////////////////////////////////////



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




            $request->request->add(['com_code' => $com_code, 'added_by' => auth('admin')->user()->id, 'date' => now(), 'account_number' => 1, 'account_number' => $account_number]);


         
            Supplier::create($request->except('_token'));
         ////////////////////// finish suppliers ///////

        //insert into accounts
        $data_insert_account['name'] = $request->name;
        $data_insert_account['start_balance_status'] = $request->start_balance_status;
        if ($data_insert_account['start_balance_status'] == 1) {
          //credit
          $data_insert_account['start_balance'] = $request->start_balance * (-1);
        } elseif ($data_insert_account['start_balance_status'] == 2) {
          //debit
          $data_insert_account['start_balance'] = $request->start_balance;
          if ($data_insert_account['start_balance'] < 0) {
            $data_insert_account['start_balance'] = $data_insert_account['start_balance'] * (-1);
          }
        } elseif ($data_insert_account['start_balance_status'] == 3) {
          //balanced
          $data_insert_account['start_balance'] = 0;
        } else {
          $data_insert_account['start_balance_status'] = 3;
          $data_insert_account['start_balance'] = 0;
        }

        $suppliers_parent_account_number = AdminSettings::where('com_code',auth('admin')->user()->com_code)->first();
        $data_insert_account['notes'] = $request->notes;
        $data_insert_account['parent_account_number'] = $suppliers_parent_account_number->supplier_parent_account_number;
        $data_insert_account['is_parent'] = 0;
        $data_insert_account['account_number'] = $account_number;
        $data_insert_account['account_type'] = 2;
        $data_insert_account['is_archived'] = $request->active;
        $data_insert_account['added_by'] = auth()->user()->id;
        $data_insert_account['created_at'] = date("Y-m-d H:i:s");
        $data_insert_account['date'] = date("Y-m-d");
        $data_insert_account['com_code'] = $com_code;
        $data_insert_account['other_table_FK'] =  $supplier_code;

        Accounts::create($data_insert_account);


         return redirect()->route('suppliers.index')->with(['success' => 'لقد تم اضافة البيانات بنجاح']);







    
        
        } catch (\Exception $e) {
            //throw $th;
            DB::rollback();
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
