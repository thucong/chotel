<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Rating extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = ['id_rating','rid','rating'];
    protected $table="rating";
    protected $primaryKey="id_rating";
    public function rating($id){
    	return DB::table('rating')->where('rid',$id)->avg('rating'); 
    		# code...
    	}
    }

