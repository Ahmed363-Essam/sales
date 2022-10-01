<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasuries_delivery extends Model
{
    use HasFactory;

    protected $fillab = ['treasuries_id','treasuries_can_delivery','added_by','updated_by','com_code'];

    public function Treasuries()
    {
        return $this->belongsTo(Treasuries::class,'treasuries_can_delivery');
    }

 
}
