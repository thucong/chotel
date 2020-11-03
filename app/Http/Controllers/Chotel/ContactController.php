<?php

namespace App\Http\Controllers\Chotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function contact(){
		return view('chotel.contact.contact');
	}
    
}
