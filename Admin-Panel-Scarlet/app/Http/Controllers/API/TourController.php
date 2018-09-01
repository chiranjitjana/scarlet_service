<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\TourTopic;
use App\Models\TourList;
use App\Models\TourOverview;
use App\Constant\Utils;

use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class TourController extends Controller
{
    /*Create tour topic*/
    public function addToTourTopic(Request $request){
      $user= Auth::user();
      $input = $request->all();
      $file = $request->file('cover_image');

      $input['cover_image']= Utils::uploadFile($file);
      $input['tour_type']=$request['tour_type'];
      $input['topic_name']=$request['topic_name'];
      $input['description']=$request['description'];
      $input['created_date']=Carbon::now();
      $input['created_by']=$user->id;

      TourTopic::create($input);

      return response ()->json ( array (
                'status' => 'ok',
                'msg' => "Tour Topic Created",
                'alert' => 'alert-success'
            ), 200 );
    }

    /*get all tour topic*/
    public function getAllTourTopic(){
      $listOfTour=TourTopic::orderBy('tour_id')->get();

      return response ()->json ( array (
                'status' => 'ok',
                'data'=>$listOfTour
            ), 200 );
    }

    /*update tour topic */
    public function updateTourTopic(Request $request){
      $user= Auth::user();
      $file=$request->file('cover_image');
      $path=TourTopic::select('cover_image')->where('tour_id', $request['tour_id'])->get()[0]->cover_image;
      if($file!=null){
        $path=Utils::uploadFile($file);
        Utils::deleteImage(TourTopic::select('cover_image')->where('tour_id', $request['tour_id'])->get()[0]->cover_image);
      }

      $input= $request->all();
      TourTopic::where('tour_id', $request['tour_id'])
            ->update(['cover_image' => $path,
                      'tour_type'=>$request['tour_type'],
                      'topic_name'=>$request['topic_name'],
                      'description'=>$request['description'],
                      'created_date'=>Carbon::now(),
                      'created_by'=>$user->id,
                      'description'=>$input['description']
                    ]);

      return response ()->json ( array (
                'status' => 'ok',
                'msg' => "Tour Topic Updated",
                'alert' => 'alert-success'
            ), 200 );
    }

    /*remove tour topic */
    public function removeTourTopic($id){

            $tourTopic=TourTopic::where('tour_id', $id)->get();
            if(count($tourTopic)>0){
            Utils::deleteImage(TourTopic::select('cover_image')->where('tour_id', $id)->get()[0]->cover_image);
            TourTopic::where('tour_id', $id)->delete();


            /*here we also need to delete all the tour list & tour cover respective this tour topic*/
            //TourOverview::where('tour_id', $id)->delete();
            //TourList::where('tour_id', $id)->delete();

            return response ()->json ( array (
                      'status' => 'ok',
                      'msg' => "Tour Topic Deleted"
                  ), 200 );
                }else {
                  return response ()->json ( array (
                             'status' => 'failed',
                             'msg' => "No Tour Topic found"
                         ), 400 );
                }
    }



    /********************************** Tour list********************************************/
    public function addTour(Request $request){
      $user= Auth::user();
      $input = $request->all();
      $file = $request->file('cover_image');

      $input['cover_image']= Utils::uploadFile($file);
      $input['tour_id']=$request['tour_id'];
      $input['tour_nationality']=$request['tour_nationality'];
      $input['tour_place_name']=$request['tour_place_name'];
      $input['description']=$request['description'];
      $input['created_date']=Carbon::now();
      $input['created_by']=$user->id;

      TourList::create($input);

      return response ()->json ( array (
                'status' => 'ok',
                'msg' => "Tour Created",
                'alert' => 'alert-success'
            ), 200 );
    }

    public function updateTour(Request $request){
      $user= Auth::user();
      $file=$request->file('cover_image');
      $path=TourList::select('cover_image')->where('tour_list_id', $request['tour_list_id'])->get()[0]->cover_image;
      if($file!=null){
        $path=Utils::uploadFile($file);
        Utils::deleteImage(TourList::select('cover_image')->where('tour_list_id', $request['tour_list_id'])->get()[0]->cover_image);
      }

      $input= $request->all();
      TourList::where('tour_list_id', $request['tour_list_id'])
            ->update(['cover_image' => $path,
                      'tour_id'=>$request['tour_id'],
                      'tour_nationality'=>$request['tour_nationality'],
                      'tour_place_name'=>$request['tour_place_name'],
                      'description'=>$request['description'],
                      'created_date'=>Carbon::now(),
                      'created_by'=>$user->id
                    ]);

      return response ()->json ( array (
                'status' => 'ok',
                'msg' => "Tour Updated",
                'alert' => 'alert-success'
            ), 200 );
    }

    public function removeTour($id){

      $tour=TourList::where('tour_list_id', $id)->get();
      if(count($tour)>0){
      Utils::deleteImage(TourList::select('cover_image')->where('tour_list_id', $id)->get()[0]->cover_image);
      TourList::where('tour_list_id', $id)->delete();

      return response ()->json ( array (
                 'status' => 'ok',
                 'msg' => "Tour Deleted"
             ), 200 );
           }else {
             return response ()->json ( array (
                        'status' => 'failed',
                        'msg' => "No Tour found"
                    ), 400 );
           }
    }

    /*get all tour */
    public function getAllTour(){
      $listOfTour=TourList::orderBy('tour_list_id')->get();

      return response ()->json ( array (
                'status' => 'ok',
                'data'=>$listOfTour
            ), 200 );
    }

  /************************************** Tour overview Crud ******************************/
  public function addTourOverView(Request $request){
    $user= Auth::user();
    $input = $request->all();
    $file = $request->file('cover_image');

    $input['cover_image']= Utils::uploadFile($file);
    $input['tour_id']=$request['tour_id'];
    $input['description']=$request['description'];
    $input['created_date']=Carbon::now();
    $input['created_by']=$user->id;

    TourOverview::create($input);

    return response ()->json ( array (
              'status' => 'ok',
              'msg' => "Tour Over View Created",
              'alert' => 'alert-success'
          ), 200 );
  }

  public function updateTourOverView(Request $request){
    $user= Auth::user();
    $file=$request->file('cover_image');
    $path=TourOverview::select('cover_image')->where('tour_ov_id', $request['tour_ov_id'])->get()[0]->cover_image;
    if($file!=null){
      $path=Utils::uploadFile($file);
      Utils::deleteImage(TourOverview::select('cover_image')->where('tour_ov_id', $request['tour_ov_id'])->get()[0]->cover_image);
    }

    $input= $request->all();
    TourOverview::where('tour_ov_id', $request['tour_ov_id'])
          ->update(['cover_image' => $path,
                    'tour_id'=>$request['tour_id'],
                    'description'=>$request['description'],
                    'created_date'=>Carbon::now(),
                    'created_by'=>$user->id
                  ]);

    return response ()->json ( array (
              'status' => 'ok',
              'msg' => "Tour Over View Updated",
              'alert' => 'alert-success'
          ), 200 );
  }

  public function removeTourOverView($id){

    $TourOverView=TourOverview::where('tour_ov_id', $id)->get();
    if(count($TourOverView)>0){
    Utils::deleteImage(TourOverview::select('cover_image')->where('tour_ov_id', $id)->get()[0]->cover_image);
    TourOverview::where('tour_ov_id', $id)->delete();

    return response ()->json ( array (
               'status' => 'ok',
               'msg' => "Tour Over View Deleted"
           ), 200 );
         }else {
           return response ()->json ( array (
                      'status' => 'failed',
                      'msg' => "No Tour Over View found"
                  ), 400 );
         }
  }

  /*get all tour */
  public function getAllTourOverView(){
    $listOfTourOverView=TourOverview::orderBy('tour_ov_id')->get();

    return response ()->json ( array (
              'status' => 'ok',
              'data'=>$listOfTourOverView
          ), 200 );
  }



}
