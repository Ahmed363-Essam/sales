<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inv_itemcard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function uomMain()
    {
        return $this->belongsTo(Uoms::class,'uom_id');
    }

    public function retailUom(){
        return $this->belongsTo(Uoms::class,'retail_uom');
    }

    public function invItemCardCat()
    {
        return $this->belongsTo(Inv_itemcard_categories::class,'inv_itemcard_categories_id');
    }

    public function Inv_itemcard()
    {
     return   $this->belongsTo(self::class, 'id');


    }

}
