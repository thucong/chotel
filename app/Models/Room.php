<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $primaryKey = "rid";


    public function getItems()
    {
        return DB::table('rooms')->select()->join('room_type','rooms.type_id','=','room_type.type_id')->join('utilities','rooms.uid','=','utilities.uid')->orderBy('rid', 'desc')->paginate(3);
    }
    public function getItem($id)
    {
        return DB::table('rooms')->select()->join('room_type','rooms.type_id','=','room_type.type_id')->join('utilities','rooms.uid','=','utilities.uid')->where('rooms.rid',$id)->get();
        //return $this->findOrFail($id);
        // return DB::table('rooms')->where('rid', $id)->first();
    }
    public function getRoomType($id,$typeId){
        return DB::table('rooms')->select()->join('room_type','rooms.type_id','=','room_type.type_id')->join('utilities','rooms.uid','=','utilities.uid')->where('rooms.type_id',$typeId)->where('rooms.rid','<>',$id)->limit(3)->get();
    }
    public function getType($id){
         return DB::table('rooms')->select()->join('room_type','rooms.type_id','=','room_type.type_id')->join('utilities','rooms.uid','=','utilities.uid')->where('room_type.type_id',$id)->paginate(3);
    }
    public function addItem($data){
        return DB::table('rooms')->insert($data);
    }
    public function get($id){
        return $this->findOrFail($id);
    }
    public function editItem($data,$id){
        return DB::table('rooms')->where('rid',$id)->update($data);
    }
    public function delItem($id){
        return DB::table('rooms')->where('rid',$id)->delete();
    }
    // public function sameType($id_type,$id_room){
      //      $this->$id_type = $TypeId;
        //    $this->$id_room = $RoomID;
        //return DB::table('rooms')->join('room_type','room_type.type_id','=','rooms.type_id')->where('rid','<>','RoomID')->where('type_id','=','$id_type')->get();
    //}
    

}
