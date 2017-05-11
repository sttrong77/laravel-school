<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\User;
use App\Models\Sale;
use Carbon\Carbon;

class HotmartController extends Controller
{

  public function access(Request $request){
    $data =  $request->all();

    $course = Course::where('code',$data['prod'])->get()->first();

    $user = User::where('token',$data['hottok'])->get()->first();

    if($course->user_id != $user->id)
      return response()->json(['error'=>'Not permission'],401);

    $student = User::where('email',$data['email'])->get()->first();

    if($student == null){//se usuario tá comprando curso mas não está cadastrado
      $student = User::create([
        'name'      => $data['name'],
        'email'     => $data['email'],
        'url'       => createUrl($data['name']),
        'password'  => bcrypt(generatePassword())
      ]);
    }

    $date = Carbon::parse($data['purchase_date'])->format('Y-m-d');

    $newSale = Sale::create([
      'course_id'=>$course->id,
      'user_id'=>$student->id,
      'transaction'=>$data['transaction'],
      'status'=>$data['status'],
      'date'=>$date
    ]);

    if($newSale)
      return response()->json(['success'=>'Success'],200);
    else
      return response()->json(['error'=>'Fail insert'],500);

  }

}
