<?php

namespace App\Http\Controllers\Chotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Rating;
class RoomController extends Controller
{
     public function __construct(Room $mroom,Rating $mrating)
    {
        $this->mroom = $mroom;
        $this->mrating=$mrating;
    }
  
    public function index()
    {
        $items = $this->mroom->getItems();
       // $lists = $this->mtype->getType();
        $room_type = RoomType::all();
        //$lists =$this->mroom->list();
        return view('chotel.room.index',['items'=>$items ],compact('room_type'));

    }

    public function list($slug, $id)
    {
        $room_type = RoomType::all();
        $types = $this->mroom->getType($id);
       
        return view('chotel.room.list', ['types'=>$types ],compact('slug', 'id','room_type'));
    }
    public function detail($slug, $id, $typeId)
    {
        $item = $this->mroom->getItem($id);
        $sameType =$this->mroom->getRoomType($id,$typeId);
        //$sames = $this->mroom->sameType();
        $rating = $this->mrating->rating($id);
        $rating = round($rating);
        return view('chotel.room.detail',compact('item','sameType','rating'));
    }
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
        $rating->rid = $data['rid'];
        $rating->rating = $data['index'];
        $rating->save();
        echo "done";
    }

}
