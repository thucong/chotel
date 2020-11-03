<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User1;
use App\Http\Requests\UserRequest;
use Auth;
use Illuminate\Support\Facades\DB;
class AdminUserController extends Controller
{
    public function __construct(User1 $muser){
        $this->muser = $muser;
    }
    public function index(){
       // $items = $this->muser->getItems();
        $users = User1::all();
        $count = User1::all()->count();
        return view('admin.user.index',compact('users','count'));
    }
    public function add()
    {
        return view('admin.user.add');
    }
    public function postAdd(UserRequest $request){
        $user = $request->user;
        $pass = bcrypt($request->pass); //bcrypt();
        $fullname = $request->fullname;
        $data = ['username'=>$user,'password'=>$pass,'fullname'=>$fullname];
        $result = $this->muser->addItem($data);
        if($result){
            return redirect()->route('admin.user.index');
        }else{
            return redirect()->route('admin.user.index')->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }
    public function edit($id,Request $request)
    {
         $user = $this->muser->getItem($id);
         if(Auth::user()->username != $user->username && Auth::user()->username != 'admin'){
            $request->session()->flash('msg','Bạn không được sửa thông tin của người khác');
         }
        return view('admin.user.edit',compact('id','user'));
    }
    public function postEdit(Request $request,$id){
        $user = $request->user;
        $pass = $request->pass;
        $fullname=$request->fullname;
        $data = ['username'=>$user,'password'=>$pass,'fullname'=>$fullname];
        $result = $this->muser->editItem($data,$id);
        if($result){
            return redirect()->route('admin.user.index')->with('msg','Đã sửa thành công');
        }else{
            return redirect()->route('admin.user.edit',$id)->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }
    public function delete($id,Request $request)
    {
        $user = $this->muser->getItem($id);
        if($user->username == 'admin'){
            $request->session()->flash('msg','Bạn không thể xóa admin');
            return redirect()->route('admin.user.index');
        }
        $result = $this->muser->delItem($id);
     
        return redirect()->route('admin.user.index')->with('msg','Đã xóa thành công');
    }
    public function search(Request $request){
        $tukhoa = $request->tukhoa;
        $search = DB::table('users')->where('username','LIKE','%'.$tukhoa.'%')->orwhere('fullname','LIKE','%'.$tukhoa.'%')->paginate(3);
        //dd($search);
       return view('admin.user.search')->with('search',$search)->with('tukhoa',$tukhoa);
    }
}
