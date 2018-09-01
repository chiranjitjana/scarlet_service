<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Contacts;
use App\Constant\Utils;

use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
class ContactsController extends Controller
{

  /*create new contact*/
  public function addContact(Request $request){

    $input['user_name']=$request['user_name'];
    $input['email']=$request['email'];
    $input['phone']=$request['phone'];
    $input['desitnation']=$request['desitnation'];
    $input['field_of_study']=$request['field_of_study'];
    $input['profession']=$request['profession'];
    $input['comments']=$request['comments'];
    $input['created_date']=Carbon::now();

    Contacts::create($input);

    return response ()->json ( array (
              'status' => 'ok',
              'msg' => "We will get back to you soon",
              'alert' => 'alert-success'
          ), 200 );
  }

/*get All gallery images*/
  public function getAllContact(){
    $listOfContacts=Contacts::orderBy('contact_id')->get();

    return response ()->json ( array (
              'status' => 'ok',
              'data'=>$listOfContacts
          ), 200 );
  }

}
