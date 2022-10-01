<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Admin;

class Treasuries extends Model
{
    use HasFactory;

    protected $fillable = ['name','is_master','last_isal_exchange','last_isal_collect','added_by','updated_by','com_code','date','active'];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'added_by');
    }

    public function admin2()
    {
        return $this->belongsTo(Admin::class,'updated_by');
    }

    public function  Treasuries_delivery()
    {
        return $this->hasMany(Treasuries_delivery::class,'treasuries_can_delivery');
    }
}
