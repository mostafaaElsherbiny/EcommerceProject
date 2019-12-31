<?php
namespace App\Traits;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Trait UploadAble
 * @package App\Traits
 *
 */


trait UploadAble{
/**
 * @param Uploadedfile $file
 * @param null  $folder
 * @param string $disk
 * @param null $filename
 * @return false/string
 */

    public function uploadOne(UploadedFile $file,$folder=null,$disk='public',$filename=null)
    {
        $name=!is_null($filename)?$filename:str_random(25);
        return $file->storeAs(
            $folder,
            $name . ".". $file->getClientOriginalExtension(),
            $disk
        );
    }















    public function deleteOne($path=null,$disk='public'){
        Storage::disk($disk)->delete($path);
    }


}

