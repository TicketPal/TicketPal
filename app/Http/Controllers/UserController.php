<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function Profile(Request $request){
        $profile = DB::table('users')->where('id',Auth()->user()->id)->get();
		$profile = $profile[0];
		$data['template'] = 'profile';
        return view('main',compact('data','profile'));
	}
	
    public function UpdateProfile(Request $request){
        $request->validate([
            'first_name'         =>   'required',
            'last_name'         =>   'required',
            'username'         =>   'required',
            'password'     =>   'required|min:6'
        ]);
		
        $data = $request->all();

		if(isset($data['email'])){
			unset($data['email']);
		}
		
		if(isset($data['_token'])){
			unset($data['_token']);
		}
		
		$data['password'] = Hash::make($data['password']);
		
		DB::table('users')
        ->where('id',Auth()->user()->id)
        ->limit(1)
        ->update($data);
	}
	
    public function users($id = 0){
        $users = DB::table('users')->offset($id*10)->limit(10)->get();
		$data['template'] = 'users';
		$pg = new \stdClass(); 
		$pg->next = ($id + 1);
		$pg->previous = (($id -1) < 0)? 0 : ($id - 1);
        return view('main',compact('data','users','pg'));
	}
	
    public function create(){
		$data['template'] = 'cuser';
        return view('main',compact('data'));
	}
	
    public function delete(Request $request){
		return DB::table('users')->whereIn('id',$request->users)->delete();
	}
	
    public function CreateUser(Request $request){
		
        $request->validate([
            'username'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();
		$data['password'] = Hash::make($data['password']);
        User::create($data);
	}
}
