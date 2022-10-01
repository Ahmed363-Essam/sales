<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Admin\Treasuries;
use Illuminate\Database\Eloquent\Model;

class Admin  extends Authenticatable
{
    use HasFactory;

    protected $fillable =
    [
        'name','username','email','password', 'added_by','updated_by','updated_by'
    ];

    public function Treasuries()
    {
        return $this->hasMany(Treasuries::class,'treasuries','added_by');
    }
}
