<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait photoUploiadTraits
{
    public function Upload(Request $request , $options)
    {
           
        $file =  $request->file('photo');
        $photo_name = $file->getClientOriginalName();

        return $file->storeAs($photo_name,$photo_name,$options);
    }
}



