<?php

namespace App\Http\Controllers\Chotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function about(){
		return view('chotel.about.about');
	}
    
}
