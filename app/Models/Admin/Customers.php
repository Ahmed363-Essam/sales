<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $guarded  = [];
    
    

    public function admin()
    {
        return $this->belongsTo(Admin::class,'added_by');
    }

    public function admin2()
    {
        return $this->belongsTo(Admin::class,'updated_by');
    }


    public function AccCustomer()
    {
        return $this->belongsTo(Accounts::class,'account_number');
    }
}
