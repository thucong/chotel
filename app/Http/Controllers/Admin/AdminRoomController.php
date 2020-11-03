<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\RoomRequest;
use App\Models\RoomType;
use App\Models\Utility;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class AdminRoomController extends Controller
{
     public function __construct(Room $mroom){
        $this->mroom = $mroom;
    }
    public function index(){
        $items = $this->mroom->getItems();
        return view('admin.room.index',['items'=> $items]);
    }
    public function add()
    {
        $room_type = RoomType::all();
        $utility = Utility::all();
        return view('admin.room.add',compact('room_type','utility'));
    }
    public function postAdd(RoomRequest $request){
        
        //$hinhanh = rand().'.'. $image->getClientOriginalExtension();
        //$image->move(public_path('/storage/app/public/files'),$hinhanh);
        //$hinhanh =  Str::of('$path')->start('/');
        //dd($hinhanh);
       // $path = $request->file('hinhanh')->store('files');
        //$name = $request->file('hinhanh')->getClientOriginalName();
       // $name = $path->extension();
       // dd($name);
        if($request->hasFile('hinhanh')){
            $path = $request->file('hinhanh')->store('files');
            $img = explode("/",$path);
            $hinhanh = end($img);
        }else{
            $hinhanh = "";
        }
        
        $ten = $request->ten;
        $mota = $request->mota;
        $loaiphong = $request->loaiphong;
        $tienich = $request->tienich;
        $data = ['rname'=>$ten, 'description' =>$mota, 'type_id'=>$loaiphong,'uid'=>$tienich,'picture'=>$hinhanh];
        $result = $this->mroom->addItem($data);
        if($result){
            return redirect()->route('admin.room.index');
        }else{
            return redirect()->route('admin.room.index')->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }

    public function edit($id)
    {
        $room = $this->mroom->get($id);
        $room_type = RoomType::all();
        $utility = Utility::all();
        return view('admin.room.edit', compact('id','room','room_type','utility'));
    }
    public function postEdit(RoomRequest $request,$id){
        // $image = $request->file('hinhanh');
        //$hinhanh = rand().'.'. $image->getClientOriginalExtension();
        //$image->move(public_path('/storage/app/public/files'),$hinhanh);
        //$hinhanh =  Str::of('$path')->start('/');
        //dd($hinhanh);
        
        $hinhanh = $request->hinhanh;
        if($request->hasFile('hinhanh')){
            $path = $request->file('hinhanh')->store('files');
            $img = explode("/",$path);
            $hinhanh = end($img);
            //Storage::delete($request->hinhanh);
        }
        $ten = $request->ten;
        $mota = $request->mota;
        $loaiphong = $request->loaiphong;
        $tienich = $request->tienich;
        $hinhanh = $request->hinhanh;
        $data = ['rname'=>$ten, 'description' =>$mota, 'type_id'=>$loaiphong,'uid'=>$tienich,'picture'=>$hinhanh];
        $result = $this->mroom->editItem($data,$id);
        if($result){
            return redirect()->route('admin.room.index');
        }else{
            return redirect()->route('admin.room.edit')->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }
    public function delete($id)
    {
       $result = $this->mroom->delItem($id);
     
        return redirect()->route('admin.room.index')->with('msg','Đã xóa thành công');
    }
     public function search(Request $request){
        $tukhoa = $request->tukhoa;
        $search = DB::table('rooms')->where('rname','LIKE','%'.$tukhoa.'%')->join('room_type','rooms.type_id','=','room_type.type_id')->join('utilities','rooms.uid','=','utilities.uid')->paginate(3);
        //dd($search);
         $utility = Utility::all();
       return view('admin.room.search')->with('search',$search)->with('tukhoa',$tukhoa)->with('');
    }
}
