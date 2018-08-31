<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use App\Constant\Utils;

use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class TestimonialController extends Controller
{
  /*Create Testimonial*/
    public function addTestimonial(Request $request){
      $user= Auth::user();
      $input = $request->all();
      $file = $request->file('avtar');

      $input['avtar']= Utils::uploadFile($file);
      $input['user_name']=$input['user_name'];
      $input['profession']=$input['profession'];
      $input['rating']=$input['rating'];
      $input['feedback']=$input['feedback'];
      $input['created_date']=Carbon::now();
      $input['created_by']=$user->id;

      Testimonials::create($input);

      return response ()->json ( array (
                'status' => 'ok',
                'msg' => "Testimonial Created",
                'alert' => 'alert-success'
            ), 200 );
    }

    /* get all testimonal list*/
    public function getAllTestimonials(){
      $listOfTestimonial=Testimonials::orderBy('testimonial_id')->get();

      return response ()->json ( array (
                'status' => 'ok',
                'data'=>$listOfTestimonial
            ), 200 );
    }

    /*Delete a testimonial testimonial id*/
    public function removeTestimonial($id){

            $testimonial=Testimonials::where('testimonial_id', $id)->get();
            if(count($testimonial)>0){
            Utils::deleteImage(Testimonials::select('avtar')->where('testimonial_id', $id)->get()[0]->avtar);
            Testimonials::where('testimonial_id', $id)->delete();

           return response ()->json ( array (
                      'status' => 'ok',
                      'msg' => "Testimonial Deleted"
                  ), 200 );
                }else {
                  return response ()->json ( array (
                             'status' => 'failed',
                             'msg' => "No Testimonial found"
                         ), 400 );
                }
    }

    /*update a testimonial slider by id  this need */
    public function updateTestimonial(Request $request){
      $user= Auth::user();
      $file=$request->file('avtar');
      $path=Testimonials::select('avtar')->where('testimonial_id', $request['testimonial_id'])->get()[0]->avtar;
      if($file!=null){
        $path=Utils::uploadFile($file);
        Utils::deleteImage(Testimonials::select('avtar')->where('testimonial_id', $request['testimonial_id'])->get()[0]->avtar);
      }

      $input= $request->all();
      Testimonials::where('testimonial_id', $request['testimonial_id'])
            ->update(['avtar' => $path,
                      'created_date'=>Carbon::now(),
                      'created_by'=>$user->id,
                      'feedback'=>$input['feedback'],
                      'user_name'=>$input['user_name'],
                      'profession'=>$input['profession'],
                      'rating'=>$input['rating']
                    ]);

      return response ()->json ( array (
                'status' => 'ok',
                'msg' => "Testimonial Updated",
                'alert' => 'alert-success'
            ), 200 );
    }

}
