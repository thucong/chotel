<?php

namespace App\Http\Controllers\Chotel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Comment;
class CommentController extends Controller
{
	public function __construct(Comment $mcmt)
    {
        $this->mcmt = $mcmt;
    }
     public function postComment($id,Request $request){
        $rid = $id;
        //$room = Room::find($id);
        $user = $request->username;
        $email = $request->email;
        $nd = $request->noidung;

        $data = ['username'=>$user,'email'=>$email,'noidung'=>$nd,'rid'=>$rid];
        $result = $this->mcmt->comment($data);
        return view('chotel.room.detail',compact('result'));
    }
    public function getComment($id){
        $cmt = $this->mcmt->getComment($id);
        return view('chotel.room.detail',compact('cmt'));
    }
}
