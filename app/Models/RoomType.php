<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class RoomType extends Model
{
    use HasFactory;
    protected $table = "room_type";
    protected $primaryKey = "type_id";
    public function getType(){
    	return DB::table('room_type')->select()->join('rooms','rooms.type_id','=','room_type.type_id')->get();
    }
   	public function addItem($data){
   		return DB::table('room_type')->insert($data);
   	}
   	public function editItem($data,$id){
   		return DB::table('room_type')->where('type_id',$id)->update($data);
   	}
   	public function getItem($id){
   		return $this->findOrFail($id);
   	}
   	public function delItem($id){
   		return DB::table('room_type')->where('type_id',$id)->delete();
   	}
}
