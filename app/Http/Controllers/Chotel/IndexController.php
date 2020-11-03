<?php

namespace App\Http\Controllers\Chotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function __construct(Room $mroom){
    	$this->mroom = $mroom;
    }
    public function index(){
    	$items = $this->mroom->getItems();
    	return view('chotel.index.index',['items'=> $items]);
    }
    public function search(Request $request){
        $tukhoa = $request->tukhoa;
        $search = DB::table('rooms')->where('rname','LIKE','%'.$tukhoa.'%')->get();
        //dd($search);
       return view('chotel.index.search')->with('search',$search)->with('tukhoa',$tukhoa);
    }
}
