<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Inv_itemcard_categories;
use Illuminate\Http\Request;

class InvItemcardCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Inv_itemcard_categories::orderby('id')->paginate(PAGINATE_COUNT);



        return view('admin.inv_itemcard_categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.inv_itemcard_categories.create');
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

        $request->request->add([
            'added_by'=>auth('admin')->user()->id,
            'com_code'=>1,
            'date'=>now()
        ]);
  
        Inv_itemcard_categories::create($request->except('_token'));



/*
        Inv_itemcard_categories::create([
            'name'=>$request->name,
            'added_by'=>auth('admin')->user()->id,
            'com_code'=>1,
            'date'=>now(),
            'active'=>$request->active
        ]);*/

        session()->flash('success','تم اضافة الوحدة بنجاح');

        return redirect()->route('inv_itemcard_categories.index');  
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Inv_itemcard_categories  $inv_itemcard_categories
     * @return \Illuminate\Http\Response
     */
    public function show(Inv_itemcard_categories $inv_itemcard_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Inv_itemcard_categories  $inv_itemcard_categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = Inv_itemcard_categories::find($id);

    
        return view('admin.inv_itemcard_categories.edit',compact('data'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Inv_itemcard_categories  $inv_itemcard_categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try {
            
            $inv_itemCard_cat = Inv_itemcard_categories::findorfail($id);
            $inv_itemCard_cat->update([
                'name'=>$request->name,
                'added_by'=>auth('admin')->user()->id,
                'com_code'=>1,
                'date'=>now(),
                'active'=>$request->active,
                'updated_by' => auth('admin')->user()->id
            ]);

            session()->flash('edit', ' تم تعديل الخزنة بنجاح.');
            return redirect()->route('inv_itemcard_categories.index');
        } catch (\Exception $e) {
            //throw $th;

            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Inv_itemcard_categories  $inv_itemcard_categories
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $catId = Inv_itemcard_categories::findorfail($id);

        $catId->delete();


        session()->flash('delete','تم حذف الوحدة بنجاح');
        return redirect()->route('inv_itemcard_categories.index');
        
    }
}
