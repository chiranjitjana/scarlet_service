<?php

namespace App\Constant;

use Illuminate\Database\Eloquent\Model;

class Utils extends Model
{
    public static $utils=[
      'upload_path' => 'E:/Angular/uploads/',
      'delete_path'=>'E:\\Angular\\uploads\\'
    ];

    public static function uploadFile($file){
      $destinationPath=Utils::$utils['upload_path'];
      $timestamp = time();

      if($file!=null){
        $file->move($destinationPath,$timestamp.$file->getClientOriginalName());
        return $destinationPath.'/'.$timestamp.$file->getClientOriginalName();
      }

      return "No image Found";
    }

  public static function deleteImage($path){
      $real_path=Utils::$utils['delete_path'].basename($path);
      if(file_exists($real_path)) {
            unlink($real_path);
      }
  }
}
