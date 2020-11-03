<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\utility;
use App\Http\Requests\UtilityRequest;
use Illuminate\Support\Facades\DB;
class AdminUtilityController extends Controller
{
    public function __construct(Utility $mutility){
    	$this->mutility = $mutility;
    }
    public function index(){
    	$utilities =$this->mutility->get();
    	
        return view('admin.utility.index',['utilities'=> $utilities]);
    }
    public function add()
    {
        return view('admin.utility.add');
    }
    public function postAdd(UtilityRequest $request){
        $ten = $request->ten;
        $data = ['uname'=>$ten];
        $result = $this->mutility->addItem($data);
        if($result){
            return redirect()->route('admin.utility.index');
        }else{
            return redirect()->route('admin.utility.index')->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }
    public function edit($id)
    {
        $utility = $this->mutility->getItem($id);
        return view('admin.utility.edit', compact('id','utility'));
    }
     public function postEdit(Request $request,$id)
    {
        $ten = $request->ten;
        $data = ['uname'=>$ten];
        $result = $this->mutility->editItem($data,$id);
        if($result){
            return redirect()->route('admin.utility.index')->with('msg','Đã sửa thành công');
        }else{
            return redirect()->route('admin.utility.edit',$id)->with('msg','Lỗi. Vui lòng thử lại!');
        }
    }
    public function delete($id)
    {
         $result = $this->mutility->delItem($id);
     
        return redirect()->route('admin.utility.index')->with('msg','Đã xóa thành công');
    }
    public function search(Request $request){
        $tukhoa = $request->tukhoa;
        $search = DB::table('utilities')->where('uname','LIKE','%'.$tukhoa.'%')->paginate(3);
        //dd($search);
       return view('admin.utility.search')->with('search',$search)->with('tukhoa',$tukhoa);
    }
}
