<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class User1 extends Model
{
    use HasFactory;
    protected $table ="users";
    protected $primaryKey ="id";
    public function addItem($data){
   		return DB::table('users')->insert($data);
   	}
   	public function editItem($data,$id){
   		return DB::table('users')->where('id',$id)->update($data);
   	}
   	public function getItem($id){
   		return $this->findOrFail($id);
   		//dd($id);
   	}
   	public function delItem($id){
   		return DB::table('users')->where('id',$id)->delete();
   	}
   public function search(){
      return DB::table('users')->where('username','LIKE','%%')->paginate(3);
   }
}
