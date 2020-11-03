<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utility extends Model
{
    use HasFactory;
    protected $table="utilities";
    protected $primaryKey ="uid";
    public function get(){
    	return DB::table("utilities")->get();
    }
    public function addItem($data){
   		return DB::table('utilities')->insert($data);
   	}
   	public function editItem($data,$id){
   		return DB::table('utilities')->where('uid',$id)->update($data);
   	}
   	public function getItem($id){
   		return $this->findOrFail($id);
   		//dd($id);
   	}
   	public function delItem($id){
   		return DB::table('utilities')->where('uid',$id)->delete();
   	}
}
