<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSettings extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'system_name','photo','active','general_alert','address','phone','added_by','updated_by','com_code'
    ];
}
