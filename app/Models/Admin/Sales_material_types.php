<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Sales_material_types extends Model
{
    use HasFactory;

    protected $fillable = ['name','added_by','updated_by','com_code','date','active'];
    
    public function admin()
    {
        return $this->belongsTo(Admin::class,'added_by');
    }

    public function adminup()
    {
        return $this->belongsTo(Admin::class,'updated_by');
    }
}
