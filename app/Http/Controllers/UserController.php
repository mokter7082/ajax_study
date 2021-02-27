<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){
      $user = DB::table('users')->get();
       return view('pages.croud',compact('user'));
     }
    public function User(){
       $user = DB::table('users')->get();
      // return $user;
      return response($user);
    }
    public function editUser($id){
      $u_user = DB::table('users') 
             ->where('id',$id)
             ->first();
      //return response->json($u_user);
      return response()->json($u_user);
    }
}
