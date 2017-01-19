<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{

	// 浏览分类
    public function getIndex(){
    	return view('cate.index',['list'=>self::getCates()]);
    }
    public static function prname($pid){
    	$prname = DB::table('cate')->where('id',$pid)->first()['pname'];
    	echo empty($prname)?'顶级分类':$prname;
    }
	// 添加模版
    public function getAdd($id=''){
    	$cate = self::getCates();
    	return view('cate.add',['list'=>$cate,'id'=>$id]);
    }

    //处理数据
    public static function getCates(){
    	$cate = DB::table('cate')->select('*',DB::raw('concat(path,id) as paths'))->orderBy('paths')->get();
    	foreach($cate as $k=>$v){
    		$num = count(explode(',',$v['path']))-2;
    		$cate[$k]['pname'] = str_repeat('☆',$num).$v['pname'];
    	}
    	// dd($cate);
    	return $cate;
        
    }

    // 添加操作
    public function postInsert(Request $request){
    	if($request->input('id')==0){
    		$data['pname'] = $request->input('pname');
    		$data['pid'] = 0;
    		$data['path'] = '0,';
    	}else{
    		$data['pname'] = $request->input('pname');
    		$data['pid'] = $request->input('id');
    		$path = DB::table('cate')->where('id',$request->input('id'))->first()['path'];
    		$data['path'] = $path.$request->input('id').',';
    	}
    	$res = DB::table('cate')->insert($data);
    	if($res){
    		return redirect('/admin/cate/index')->with('success','添加分类成功');
    	}else{
    		return back()->with('error','添加失败');
    	}
    }

    // 删除分类
    public function getDel($id){
    	$data = DB::table('cate')->where('pid',$id)->get();
    	if(count($data) > 0){
    		return back()->with('error','该类下面有子类不能删除');
    	}else{
    		return back()->with('error','嘛呢？');
    	}
    }

    // 修改页面
    public function getEdit($pid){
    	if($pid=='0'){
    		$data = '顶级分类';
    	}else{
    		$data = DB::table('cate')->where('id',$pid)->first()['pname'];
    	}
    	
    	return view('cate.edit',['list'=>$data]);
    }
}
