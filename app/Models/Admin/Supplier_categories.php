<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin;

class Supplier_categories extends Model
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

}
