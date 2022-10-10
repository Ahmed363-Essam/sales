<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];


    
    public function admin()
    {
        return $this->belongsTo(Admin::class,'added_by');
    }

    public function admin2()
    {
        return $this->belongsTo(Admin::class,'updated_by');
    }

    public function cat()
    {
        return $this->belongsTo(Inv_itemcard_categories::class,'supplier_categories_id');
    }
}
