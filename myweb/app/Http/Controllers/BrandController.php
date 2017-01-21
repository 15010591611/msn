<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    // 品牌视图
    public function getIndex(Request $request){
    	$data = DB::table('brand')->where(function($query) use($request){
            if($request->input('keyword')!=null){
                $query->where('brname','like','%'.$request->input('keyword').'%')
                      ->orWhere('natrue','like','%'.$request->input('keyword').'%');
            }
        })->paginate($request->input('num',5));
        // var_dump($data);
        return view('brand.index',['list'=>$data,'request'=>$request->all()]);
    }

    // 品牌添加
    public function getAdd(){
    	return view('brand.add');
    }

    // 执行添加操作
    public function postInsert(Request $request){
    	$this->validate($request,[
    			'brname'=>'required|unique:brand',
    			'natrue'=>'required'
    		],[
    			'brname.required'=>'品牌名称不能为空！',
    			'brname.unique'=>'该品牌已存在！',
    			'natrue.required'=>'品牌属性不能为空！'
    		]);
    	if(!$request->hasFile('brpic')){
    		return back()->with('error','上传图片有误！');
    	}
    	//上传到指定文件夹
    	$file = $request->file('brpic')->move('/ad/images/brand/', time().'.jpg');
    	// 拼接图片路径位置
    	$brpic = '/ad/images/brand/'.pathinfo($file)['basename'];
    	// 
    	$data = $request->except(['_token']);
    	$data['brpic'] = $brpic;
    	// 
    	$res = DB::table('brand')->insert($data);
    	if($res){
    		return redirect('admin/brand/index')->with('success','添加品牌成功！');
    	}else{
    		return back()->width('error','添加品牌失败！');
    	}
    }
}