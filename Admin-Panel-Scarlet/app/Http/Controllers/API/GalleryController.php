<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Gallery;
use App\Constant\Utils;

use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class GalleryController extends Controller
{
  /*Create Gallery*/
    public function addToGallery(Request $request){
      $user= Auth::user();
      $input = $request->all();
      $file = $request->file('cover_image');

      $input['cover_image']= Utils::uploadFile($file);
      $input['gallery_type']=$request['gallery_type'];
      $input['description']=$request['description'];
      $input['created_date']=Carbon::now();
      $input['created_by']=$user->id;

      Gallery::create($input);

      return response ()->json ( array (
                'status' => 'ok',
                'msg' => "Item Added in Gallery",
                'alert' => 'alert-success'
            ), 200 );
    }

 /*get All gallery images*/
    public function getAllGallery(){
      $listOfGallery=Gallery::orderBy('gallery_id')->get();

      return response ()->json ( array (
                'status' => 'ok',
                'data'=>$listOfGallery
            ), 200 );
    }

    /*get all

  /*Delete a gallery by id*/
  public function removeGallery($id){

          $homeGallery=Gallery::where('gallery_id', $id)->get();
          if(count($homeGallery)>0){
          Utils::deleteImage(Gallery::select('cover_image')->where('gallery_id', $id)->get()[0]->cover_image);
          Gallery::where('gallery_id', $id)->delete();

         return response ()->json ( array (
                    'status' => 'ok',
                    'msg' => "Gallery Deleted"
                ), 200 );
              }else {
                return response ()->json ( array (
                           'status' => 'failed',
                           'msg' => "No Gallery found"
                       ), 400 );
              }
  }

  /*update gallery */
  public function updateGallery(Request $request){
    $user= Auth::user();
    $file=$request->file('cover_image');
    $path=Gallery::select('cover_image')->where('gallery_id', $request['gallery_id'])->get()[0]->cover_image;
    if($file!=null){
      $path=Utils::uploadFile($file);
      Utils::deleteImage(Gallery::select('cover_image')->where('gallery_id', $request['gallery_id'])->get()[0]->cover_image);
    }

    $input= $request->all();
    Gallery::where('gallery_id', $request['gallery_id'])
          ->update(['cover_image' => $path,
                    'gallery_type'=>$input['gallery_type'],
                    'created_date'=>Carbon::now(),
                    'created_by'=>$user->id,
                    'description'=>$input['description']
                  ]);

    return response ()->json ( array (
              'status' => 'ok',
              'msg' => "Gallery Updated",
              'alert' => 'alert-success'
          ), 200 );
  }

}
