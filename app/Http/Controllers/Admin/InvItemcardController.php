<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\Inv_itemcard;

use App\Models\Admin\Uoms;

use App\Http\Requests\ItemCardRequest;
use App\Traits\photoUploiadTraits;
use App\Models\Admin\Inv_itemcard_categories;
use Illuminate\Http\Request;

class InvItemcardController extends Controller
{
    use photoUploiadTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $data = Inv_itemcard::where('com_code', auth('admin')->user()->id)->orderby('id')->paginate(PAGINATE_COUNT);



        return view('admin.inv_itemCard.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $com_code = auth('admin')->user()->com_code;
        $inv_itemcard_categories = Inv_itemcard_categories::where(['active' => 1, 'com_code' => $com_code])->get();
        $inv_uoms_parent = Uoms::where(['active' => 1, 'com_code' => $com_code, 'is_master' => 1])->get();
        $inv_uoms_child = Uoms::where(['active' => 1, 'com_code' => $com_code, 'is_master' => 0])->get();
        $item_card_data = Inv_itemcard::where(['active' => 1, 'com_code' => $com_code])->get();



        /* $inv_uoms_parent=get_cols_where(new Inv_uom(),array('id','name'),array('com_code'=>$com_code,'active'=>1,'is_master'=>1),'id','DESC');     
        $inv_uoms_child=get_cols_where(new Inv_uom(),array('id','name'),array('com_code'=>$com_code,'active'=>1,'is_master'=>0),'id','DESC');     
        $item_card_data=get_cols_where(new Inv_itemCard(),array('id','name'),array('com_code'=>$com_code,'active'=>1),'id','DESC');     
*/
        return view('admin.inv_itemCard.create', compact('inv_itemcard_categories', 'inv_uoms_parent', 'inv_uoms_child'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCardRequest $request)
    {
        //
        try {

            
            $com_code = auth('admin')->user()->com_code;


            // check the barcode not null        
            if ($request->barcode != null) {
                # check the barcode not duplicated in same company
                $parcodeExist = Inv_itemcard::where(['barcode' => $request->barcode, 'com_code' => $com_code])->first();

                if (!empty($parcodeExist)) {
                    
                    return redirect()->back()
                        ->with(['error' => 'عفوا باركود الصنف مسجل من قبل'])
                        ->withInput();
                } else {

                    $data_insert['barcode'] = $request->barcode;
                  //  $request->request->add(['barcode' => $barcode]);
                }
            } else {
                $data_insert['barcode'] = 'item' . random_int(1, 500);
             //   $request->request->add(['barcode' => $barcode]);
            }

            

            $data_insert['item_code']=Inv_itemcard::max('id')+1;
            $data_insert['name']=$request->name;
            $data_insert['item_type']=$request->item_type;
            $data_insert['inv_itemcard_categories_id']=$request->inv_itemcard_categories_id;
            $data_insert['uom_id']=$request->uom_id;
            $data_insert['price']=$request->price;
            $data_insert['nos_gomla_price']=$request->nos_gomla_price;
            $data_insert['gomla_price']=$request->gomla_price;
            $data_insert['cost_price']=$request->cost_price;
            $data_insert['does_has_retailunit']=$request->does_has_retailunit;
            $data_insert['parent_inv_itemcards_id']=$request->parent_inv_itemcard_id;
            if($data_insert['parent_inv_itemcards_id']==""){
                $data_insert['parent_inv_itemcards_id']=0;  
            }
           if($data_insert['does_has_retailunit']==1){ 
            $data_insert['retail_uom_quntToParent']=$request->retail_uom_quntToParent;
            $data_insert['retail_uom']=$request->retail_uom_id;
            $data_insert['price_retail']=$request->price_retail;
            $data_insert['nos_gomla_price_retail']=$request->nos_gomla_price_retail;
            $data_insert['gomla_price_retail']=$request->gomla_price_retail;
            $data_insert['cost_price_retail']=$request->cost_price_retail;
        
           }
    
           if($request->has('photo')){
            $request->validate([
                'photo'=>'required|mimes:png,jpg,jpeg|max:2000',
            ]);

         
            
            $file =  $request->file('photo');
      
            $photo_name = $file->getClientOriginalName();
            $this->Upload($request,'InvItemCard');
            $data_insert['photo'] = $photo_name;
    
        
           } 
           $data_insert['has_fixed_price']=$request->has_fixced_price;
           $data_insert['active']=$request->active;
           $data_insert['added_by'] = auth()->user()->id;
           $data_insert['created_at'] = date("Y-m-d H:i:s");
           $data_insert['date'] = date("Y-m-d");
           $data_insert['com_code'] = $com_code;

           Inv_itemCard::create($data_insert);



            //check if not exsits for name
            $checkExists_name = Inv_itemCard::where(['name' => $request->name, 'com_code' => $com_code])->first();
            if (!empty($checkExists_name)) {
                session()->flash('success','تم اضافة الوحدة بنجاح');
                return redirect()->route('itemcard.index')->withInput();
            }
        } catch (\Exception $e) {


           
            return redirect()->route('itemcard.index')
            ->with(['error' => 'عفوا حدث خطأ ما' . $e->getMessage()])
            ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Inv_itemcard  $inv_itemcard
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //

        try {

      
            
            $data = Inv_itemcard::where('id',$id)->first();
            return view('admin.inv_itemCard.show',compact('data'));




        } catch (\Throwable $th) {
            //throw $th;
        }

  



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Inv_itemcard  $inv_itemcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Inv_itemcard $inv_itemcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Inv_itemcard  $inv_itemcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inv_itemcard $inv_itemcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Inv_itemcard  $inv_itemcard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $delete = Inv_itemcard::findorfail($id);
        $delete->delete();
        session()->flash('delete', ' تم   حذف الخزنة بنجاح.');

        return redirect()->back();
    }
}
