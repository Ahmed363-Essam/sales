<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $fillable = ['name','account_type','parent_account_number','parent_account_number','start_balance_status','account_number','is_parent','start_balance','current_balance','other_table_FK','notes','added_by','updated_by','is_archived','com_code','date'];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'added_by');
    }

    public function admin2()
    {
        return $this->belongsTo(Admin::class,'updated_by');
    }

    public function accountType()
    {
        return $this->belongsTo(Accounts_types::class,'account_type');
    }

    
    public function Acc()
    {
     return   $this->belongsTo(self::class, 'id');


    }
}
