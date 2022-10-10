<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierCattegoryRequest;

use App\Models\Admin\Supplier_categories;
use Illuminate\Http\Request;

class SupplierCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Supplier_categories::orderby('id')->paginate(PAGINATE_COUNT);


        return view('admin.suppliers_categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.suppliers_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierCattegoryRequest $request)
    {
        //
     
        try {
  

            $com_code = auth('admin')->user()->com_code;


            $checkExist = Supplier_categories::where(['name' => $request->name, 'com_code' => $com_code])->first();
       

            /// ممكن استخدم ال get بس لازم      استخدم count function

            if ($checkExist !=  null) {

                return redirect()->back()
                    ->with(['error' => 'عفوا اسم الفئة مسجل من قبل'])
                    ->withInput();
            }
            else
            {
                $request->request->add(['added_by'=>auth('admin')->user()->id,'com_code'=>auth('admin')->user()->com_code,'date'=>now()]);
                Supplier_categories::create($request->except('_token'));

                return redirect()->route('suppliers_cat.index')->with(['success' => 'لقد تم اضافة البيانات بنجاح']);
            }
        } catch (\Exception $e) {
            //throw $th;

            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Supplier_categories  $supplier_categories
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier_categories $supplier_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Supplier_categories  $supplier_categories
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //

        $data =Supplier_categories::find($id);

        return view('admin.suppliers_categories.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Supplier_categories  $supplier_categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //

        try {
            
            try {
                $com_code = auth()->user()->com_code;

                $data = Supplier_categories::where(['id'=>$id , 'com_code'=>$com_code]);
     
                
                // انا واخدها كوبي بيست بس مش فاهمها اوي
                $checkExists = Supplier_categories::where(['name' => $request->name, 'com_code' => $com_code])->where('id', '!=', $id)->first();


                if ($checkExists != null) {
                    return redirect()->back()
                        ->with(['error' => 'عفوا اسم الخزنة مسجل من قبل'])
                        ->withInput();
                }

                $request->request->add(['com_code'=>$com_code,'date'=>now(),'updated_by'=>auth('admin')->user()->id]);
 
       
                $data->update($request->except(['_token','_method']));



           
                return redirect()->route('suppliers_cat.index')->with(['success' => 'لقد تم تحديث البيانات بنجاح']);
            } catch (\Exception $ex) {

    
                return redirect()->back()
                    ->with(['error' => 'عفوا حدث خطأ ما' . $ex->getMessage()])
                    ->withInput();
            }




        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Supplier_categories  $supplier_categories
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        try {
            

            $delete = Supplier_categories::findorfail($id);
            $delete->delete();
            session()->flash('delete', ' تم   حذف المورد بنجاح.');
          
            return redirect()->back();



        } catch (\Exception $e) {
            //throw $th;

            return $e->getMessage();
        }
    }
}
