<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackuserController extends Controller
{   
    // 浏览用户
    public function getIndex(Request $request){
        $data = DB::table('auser')->where(function($query) use($request){
            if($request->input('keyword')!=null){
                $query->where('name','like','%'.$request->input('keyword').'%')
                      ->orWhere('name','like','%'.$request->input('keyword').'%');
            }
        })->where('status','1')->paginate($request->input('num',1));
        // var_dump($data);
        return view('backuser.index',['list'=>$data,'request'=>$request->all()]);
    }

    // 添加模版
    public function getAdd(){
        return view('backuser.add');
    }
    // 添加操作
    public function postInsert(Request $request){
        $this->validate($request,[
                'name'=>'required',
                'username'=>'required|unique:user',
                'repass'=>'same:pass|required',
                'email'=>'required|email',
                'phone'=>'required'
            ],[
                'name.required'=>'姓名不能为空！',
                'repass.required'=>'重复密码不能为空！',
                'username.required'=>'账号不能为空！',
                'username.user'=>'账号已被注册',
                'email.required'=>'邮箱不能为空！',
                'phone.required'=>'电话不能为空！',
                'repass.same'=>'两次密码输入不正确！',
                'email.eamil'=>'请输入有效邮箱！'
            ]);

        $data = $request->except(['_token','repass']);

        $data['pass'] = Hash::make($data['pass']);
        $data['token'] = str_random(50);
        $data['status'] = 0;

        $res = DB::table('auser')->insert($data);
        if($res){
            return redirect('admin/backuser/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    // 删除(修改状态为禁用)
    public function getDel($id){
        $res = DB::table('auser')->where('id',$id)->update(['status'=>'1']);
        if($res>0){
            return redirect('admin/backuser')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    // 修改
    public function getEdit($id){
        return view('backuser.edit',[
            'vo'=>DB::table('auser')->where('id','=',$id)->first()
            ]);
    }

    // 执行修改操作
    public function postUpdate(Request $request){
        $id = $request['id'];
        $res = DB::table('auser')->where('id',$id)->update(['status'=>$request['status'],'email'=>$request['email']]);
        if($res>0){
            return redirect('admin/backuser')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    // 黑名单
    public function getLitter(Request $request){
        $data = DB::table('auser')->where(function($query) use($request){
            if($request->input('keyword')!=null){
                $query->where('name','like','%'.$request->input('keyword').'%')
                      ->orWhere('name','like','%'.$request->input('keyword').'%');
            }
        })->where('status','0')->paginate($request->input('num',1));
        // var_dump($data);
        return view('backuser.litter',['list'=>$data,'request'=>$request->all()]);
        return view('backuser.litter');
    }
}
