<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Http\Requests\RoomTypeRequest;
use Illuminate\Support\Facades\DB;
class AdminRoomTypeController extends Controller
{
     public function __construct(RoomType $roomType){
        $this->roomType = $roomType;
    }
    public function index()
    {
        $list = RoomType::all();
        $count = RoomType::all()->count();
        return view('admin.roomType.index', compact('list','count'));
    }
    public function add()
    {
        return view('admin.roomType.add');
    }
     public function postAdd(RoomTypeRequest $request)
    {
        //up hinh
        $path = $request->file('hinh')->store('files');
        dd($path);
        //dd($_POST['ten']);
        $ten = $request->ten;
        $data = ['tname'=>$ten];
        $result = $this->roomType->addItem($data);
        if($result){
            return redirect()->route('admin.roomType.index');
        }else{
            return redirect()->route('admin.roomType.index')->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }
    public function edit($id)
    {
        $roomType = $this->roomType->getItem($id);
        //dd($roomType);
        return view('admin.roomType.edit', compact('id','roomType'));
    }
    public function postEdit(Request $request,$id){
        $ten = $request->ten;
        $data = ['tname'=>$ten];
        $result = $this->roomType->editItem($data,$id);
        if($result){
            return redirect()->route('admin.roomType.index')->with('msg','Đã sửa thành công');
        }else{
            return redirect()->route('admin.roomType.edit',$id)->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }
    public function delete($id)
    {
        $result = $this->roomType->delItem($id);
     
        return redirect()->route('admin.roomType.index')->with('msg','Đã xóa thành công');
        
    }
    public function search(Request $request){
        $tukhoa = $request->tukhoa;
        $search = DB::table('room_type')->where('tname','LIKE','%'.$tukhoa.'%')->paginate(3);
        //dd($search);
       return view('admin.roomType.search')->with('search',$search)->with('tukhoa',$tukhoa);
    }
}
