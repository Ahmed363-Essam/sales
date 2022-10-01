<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Treasuries_delivery;
use App\Models\Admin\Treasuries;
use App\Http\Requests\CreateTreasuireRequest;
use Illuminate\Http\Request;
use Nette\Utils\Json;

class TreasuriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        $data = Treasuries::orderby('id')->paginate(PAGINATE_COUNT);

        return view('admin.admin_treasuire.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.treasuries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTreasuireRequest $request)
    {
        //
        try {
            Treasuries::create([

                'name' => $request->name,
                'is_master' => $request->is_master,
                'last_isal_exchange' => $request->last_isal_exhcange,
                'last_isal_collect' => $request->last_isal_collect,
                'added_by' => auth('admin')->user()->id,
                'active' => $request->active,
                'date' => now(),
                'com_code' => auth('admin')->user()->com_code

            ]);

            session()->flash('success', ' تمت اضافة الخزنة بنجاح.');

            return redirect()->route('Treasures.index');
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage() . 'fdsfsdfs' . $e->getLine();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Treasuries  $treasuries
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        
        $data=Treasuries::find($id);
        $treasuries_delivery = Treasuries_delivery::where('treasuries_id',$id)->get();

        return view('admin.treasuries.show',compact('treasuries_delivery','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Treasuries  $treasuries
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Treasuries::findorfail($id)->first();



        return view('admin.treasuries.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Treasuries  $treasuries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        try {
            $treasuries = Treasuries::findorfail($request->id);
            $treasuries->update([
                'name' => $request->name,
                'is_master' => $request->is_master,
                'last_isal_exchange' => $request->last_isal_exhcange,
                'last_isal_collect' => $request->last_isal_collect,
                'active' => $request->active,
                'updated_by' => auth('admin')->user()->id
            ]);

            session()->flash('edit', ' تم تعديل الخزنة بنجاح.');
            return redirect()->route('Treasures.index');
        } catch (\Exception $e) {
            //throw $th;

            return $e->getMessage();
        }
    }

    public function getData($name)
    {
        $infos = Treasuries::where('name','LIKE',"%{$name}%")->orderby('id')->paginate(PAGINATE_COUNT);
        return response()->json(
            [
                'msg' => $infos,
            ]

        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Treasuries  $treasuries
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //

        $delete = Treasuries_delivery::findorfail($id);
        $delete->delete();
        session()->flash('delete', ' تم   حذف الخزنة بنجاح.');
      
        return redirect()->back();
    }
}
