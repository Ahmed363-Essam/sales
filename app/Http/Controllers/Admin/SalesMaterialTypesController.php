<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sales_material_types;
use Illuminate\Http\Request;

use App\Http\Requests\CreateSaleMaterialRequest;

use App\Http\Requests\EditSaleMaterialRequest;


class SalesMaterialTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Sales_material_types::orderby('id')->paginate(PAGINATE_COUNT);

        return view('admin.sales_material_treasuire.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sales_material_treasuire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSaleMaterialRequest $request)
    {
        //

        Sales_material_types::create([
            'name' => $request->name,
            'active' => $request->active,
            'added_by' => auth('admin')->user()->id,
            'updated_by' => null,
            'com_code' => 1,
            'date' => now()
        ]);
        session()->flash('success', 'تمت الاضافة بنجاح');
        return redirect()->route('sales_material_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Sales_material_types  $sales_material_types
     * @return \Illuminate\Http\Response
     */
    public function show(Sales_material_types $sales_material_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Sales_material_types  $sales_material_types
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $data = Sales_material_types::find($id);


        return view('admin.sales_material_treasuire.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Sales_material_types  $sales_material_types
     * @return \Illuminate\Http\Response
     */
    public function update(EditSaleMaterialRequest $request,$test)
    {
        //

       

        $Sales_material_types = Sales_material_types::find($request->id);

        $Sales_material_types->update([

            'name' => $request->name,
            'active' => $request->active,
            'updated_by' => auth('admin')->user()->id,
            'date' => now()
        ]);

        session()->flash('edit','تم التعديل بنجاح');
        return redirect()->route('sales_material_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Sales_material_types  $sales_material_types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Sales_material_types::find($id);

        $data->delete();

        session()->flash('delete', 'تم الحذف بنجاح');

        return redirect()->route('sales_material_types.index');
    }
}
