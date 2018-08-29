<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\HomeOffers;
use App\Constant\Utils;

use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class HomeController extends Controller
{
  /*Create home Offers*/
    public function addHomeOffers(Request $request){
      $user= Auth::user();
      $input = $request->all();
      $file = $request->file('image_path');

      $input['image_path']= Utils::uploadFile($file);
      $input['start_date']=date_create($input['start_date']);
      $input['end_date']=date_create($input['end_date']);
      $input['created_date']=Carbon::now();
      $input['created_by']=$user->id;

      HomeOffers::create($input);

      return response ()->json ( array (
    						'status' => 'ok',
    						'msg' => "Home Offer Added",
    						'alert' => 'alert-success'
    				), 200 );
    }

 /*get All Home Offers by latest created offer*/
    public function getAllHomeOffers(){
      $listOfhomeOffers=HomeOffers::orderBy('offer_id')->get();

      return response ()->json ( array (
                'status' => 'ok',
                'data'=>$listOfhomeOffers
            ), 200 );
    }

  /*Delete a home offer by offer id*/
  public function removeHomeOffer($id){

          $homeOffers=HomeOffers::where('offer_id', $id)->get();
          if(count($homeOffers)>0){
          Utils::deleteImage(HomeOffers::select('image_path')->where('offer_id', $id)->get());
          HomeOffers::where('offer_id', $id)->delete();

         return response ()->json ( array (
                    'status' => 'ok',
                    'msg' => "Home Offer Deleted"
                ), 200 );
              }else {
                return response ()->json ( array (
                           'status' => 'failed',
                           'msg' => "No Offer found"
                       ), 400 );
              }
  }

  /*update a home offer by id  this need */
  public function updateHomeOffer(Request $request){
    $user= Auth::user();
    $file=$request->file('image_path');
    $path=HomeOffers::select('image_path')->where('offer_id', $request['offer_id'])->get()[0]->image_path;
    if($file!=null){
      $path=Utils::uploadFile($file);
      Utils::deleteImage(HomeOffers::select('image_path')->where('offer_id', $request['offer_id'])->get());
    }

    $input= $request->all();
    HomeOffers::where('offer_id', $request['offer_id'])
          ->update(['image_path' => $path,
                    'start_date'=>date_create($input['start_date']),
                    'end_date'=>date_create($input['end_date']),
                    'created_date'=>Carbon::now(),
                    'created_by'=>$user->id,
                    'description'=>$input['description']
                  ]);

    return response ()->json ( array (
              'status' => 'ok',
              'msg' => "Home Offer Updated",
              'alert' => 'alert-success'
          ), 200 );
  }
}
