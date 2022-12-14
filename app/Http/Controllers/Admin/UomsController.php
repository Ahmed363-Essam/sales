<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Uoms;
use App\Http\Requests\CreateUomsRequest;
use App\Http\Requests\EditUomsRequest;
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

        return view('admin.inv_uom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUomsRequest $request)
    {
        //

        Uoms::create([
            'name'=>$request->name,
            'is_master'=>$request->is_master,
            'added_by'=>auth('admin')->user()->id,
            'com_code'=>1,
            'date'=>now(),
            'active'=>$request->active
        ]);

        session()->flash('success','تم اضافة الوحدة بنجاح');

        return redirect()->route('uoms.index');
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
    public function edit($id)
    {

        $data = Uoms::find($id);

    
        return view('admin.inv_uom.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Uoms  $uoms
     * @return \Illuminate\Http\Response
     */
    public function update(EditUomsRequest $request,$x)
    {
        try {
            
            $Uoms = Uoms::findorfail($request->id);
            $Uoms->update([
                'name'=>$request->name,
                'is_master'=>$request->is_master,
                'added_by'=>auth('admin')->user()->id,
                'com_code'=>1,
                'date'=>now(),
                'active'=>$request->active,
                'updated_by' => auth('admin')->user()->id
            ]);

            session()->flash('edit', ' تم تعديل الخزنة بنجاح.');
            return redirect()->route('uoms.index');
        } catch (\Exception $e) {
            //throw $th;

            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Uoms  $uoms
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $uomId = Uoms::findorfail($id);

        $uomId->delete();


        session()->flash('delete','تم حذف الوحدة بنجاح');
        return redirect()->route('uoms.index');
        
    }
}
