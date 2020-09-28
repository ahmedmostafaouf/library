<?php

namespace App\Traits;
Trait General{
    function SaveImages($photo,$folder){
        // save photo in folder();
        $file_extension= $photo -> getClientOriginalExtension();
        // بزود تايم عشان لو سيفت اكتر من مره
        $file_name=time().'.'.$file_extension;
        $path=$folder;
        $photo -> move($path,$file_name);
        return $file_name;

    }
}
