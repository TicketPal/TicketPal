<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function dashboard(Request $request)
    {	
		$data['template'] = 'dashboard';
        return view('main',compact('data'));
    }
}
