<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = "id";
    public function comment($data){
        return DB::table('comment')->insert($data);
    }
    public function getComment($id){
        return DB::table('comment')->select()->join('rooms','rooms.rid','=','comment.rid');
    }
}
