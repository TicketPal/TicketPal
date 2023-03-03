<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function general(Request $request){
		
        $settings = DB::table('settings')->where('setting','general')->get();
		foreach($settings as $i => $v){
			$settings[$i]->_id = preg_replace("/[^A-zÀ-ú0-9]+/", "", $settings[$i]->key);
		}
		$data['template'] = 'settings';
        return view('main',compact('data','settings'));
	}
	
    public function Update(Request $request){
		$datas = $request->all();
		unset($datas['_token']);
		foreach($datas as $k => $v){
			DB::table('settings')
            ->where('id', $k)
            ->update(['value' => $v]);
		}
		print_r($datas);
	}
}
