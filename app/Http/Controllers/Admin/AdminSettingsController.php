<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\EditRequest;
use App\Models\Admin\Accounts;
use App\Models\Admin\AdminSettings;




use App\Traits\photoUploiadTraits;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    use photoUploiadTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = AdminSettings::where('com_code',auth('admin')->user()->com_code)->first();
       
 
       return view('admin.admin_setting.index',compact('data'));
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
     * @param  \App\Models\Admin\AdminSettings  $adminSettings
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSettings $adminSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\AdminSettings  $adminSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSettings $adminSettings)
    {
        //


        $data = AdminSettings::where('com_code',auth('admin')->user()->com_code)->first();

        $parent_accounts = Accounts::where(['is_parent'=>1 , 'com_code'=>auth('admin')->user()->com_code])->get();

        return view('admin.admin_setting.edit',compact('data','parent_accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\AdminSettings  $adminSettings
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request)
    {
        //
        try {        
       

            $admin_pannel_setting = AdminSettings::FindOrFail($request->id);


            if ($request->has('photo')) {
   
                $file =  $request->file('photo');
                $photo_name = $file->getClientOriginalName();
                $this->Upload($request,'setting');

                $admin_pannel_setting->update([
                    'system_name'=> $request->system_name,
                    'general_alert'=>$request->general_alert,
                    'address'=> $request->address,
                    'phone'=>$request->phone,
                    'updated_by'=>auth('admin')->user()->id,
                    'updated_at'=>date('Y-M-D H-I-S'),
                    'photo'=>$photo_name,
                    'customer_parent_account_number'=>$request->customer_parent_account_number,                 
                    'suppliers_parent_account_number'=>$request->suppliers_parent_account_number,  
                ]);

            }
            else
            {
                $admin_pannel_setting->update([
                    'system_name'=> $request->system_name,
                    'general_alert'=>$request->general_alert,
                    'address'=> $request->address,
                    'phone'=>$request->phone,
                    'updated_by'=>auth('admin')->user()->id,
                    'updated_at'=>date('Y-M-D H-I-S'), 
                    'customer_parent_account_number'=>$request->customer_parent_account_number                      
    
                ]);
            }
        


           /* $admin_pannel_setting->update([
                $admin_pannel_setting->system_name = $request->system_name
            ]);*/

            session()->flash('info', 'تم تعديل البيانات  بنجاح.');



            return redirect()->route('AdminSetting.index');
            

        } catch (\Exception $e) {
            //throw $th;

            return $e->getMessage();

            return redirect()->route('AdminSetting.index')->with(['error' =>'هناك خطا ما '.$e->getMessage() ]);
           
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\AdminSettings  $adminSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSettings $adminSettings)
    {
        //
    }
}
