<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Stores;
use App\Http\Requests\CreateStoreRequest;
use App\Http\Requests\EditStoreRequest;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Stores::orderby('id')->paginate(PAGINATE_COUNT);




        return view('admin.stores.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoreRequest $request)
    {
        //

        try {


            Stores::create([
                'name' => $request->name,
                'phone' => $request->phones,
                'address' => $request->address,
                'active' => $request->active,
                'added_by' => auth('admin')->user()->id,
                'updated_by' => null,
                'com_code' => 1,
                'date' => now()
            ]);

            session()->flash('success', 'تمت الاضافة بنجاح');
            return redirect()->route('store.index');
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Stores  $stores
     * @return \Illuminate\Http\Response
     */
    public function show(Stores $stores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Stores  $stores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = Stores::find($id);
        return view('admin.stores.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Stores  $stores
     * @return \Illuminate\Http\Response
     */
    public function update(EditStoreRequest $request, Stores $stores)
    {
        //



        try {

            $stores = Stores::find($request->id);

            $stores->update([

                'name' => $request->name,
                'phone' => $request->phones,
                'address'=>$request->address,
                'active'=>$request->active,
                'updated_by' => auth('admin')->user()->id,

            ]);

            session()->flash('edit', 'تم التعديل بنجاح');
            return redirect()->route('store.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Stores  $stores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Stores::find($id);

        $data->delete();

        session()->flash('delete', 'تم الحذف بنجاح');

        return redirect()->route('store.index');
    }
}
