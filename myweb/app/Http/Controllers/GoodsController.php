<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    // 商品页面
    public function getIndex(){
    	return view('goods.index');
    }

    // 商品添加模版
    public function getAdd(){
    	// 类别
    	$cate = DB::table('cate')->select('*',DB::raw('concat(path,id) as paths'))->orderBy('paths')->get();
    	foreach($cate as $k=>$v){
    		$num = count(explode(',',$v['path']))-2;
    		$cate[$k]['pname'] = str_repeat('☆',$num).$v['pname'];
    	}
    	$brand = DB::table('brand')->select('brname','id')->get();
    	return view('goods.add',['cate'=>$cate],['brand'=>$brand]);
    }

    // 执行添加操作
    public function postInsert(Request $request){
    	$this->validate($request,[
    			'goods'=>'required|unique:goods',
    			'price'=>'required',
    			'store'=>'required',
    		],[
                'goods.required'=>'商品名称不能为空！',
                'price.required'=>'单价不能为空！',
                'store.required'=>'你确定库存为零么！',
                'goods.goods'=>'该商品名称已存在！',
    		]);
    	// $file = $request->file('brpic')->move('/ad/images/brand/', time().'.jpg');
    	$data = $request->except(['_token']);
    	var_dump($data);

    }
}
