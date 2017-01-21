<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MallController extends Controller
{
    // public function getIndex(){
    // 	$data = DB::table('brand')->select('brname')->get();
    // 	$vo = DB::table('cate')->select('pname','id')->where('pid',1)->get();
    // 	$xx = DB::table('cate')->select('pname')->where('pid',3)->get();
    // 	var_dump($xx);
    // 	dd($vo);
    // @foreach($list as $v)
				//         		<li class="new_admall_menu_li0 item" height='50px'>
				//                 <h3 class="new_admall_menu_title">{{$v['pname']}}</h3>
				//                 <p class="new_admall_menu_cont">
				//                     @foreach($v['sub'] as $val)
				//                     	<a href="" target='_blank'>{{$val['pname']}}</a>
				//                     @endforeach
				//                 </p>
				//         	</li>
				//         	@endforeach
    // 	return view('mall.index',['list'=>$data]);
    // }
    //阶段3 高级完成 目标达成
    public function getIndex(){
        $cates=self::getAllCates();
        $list = self::getCatesInfo($cates,1);
        // dd($list);
    	return view('mall.index',['list'=>$list]);

    }

    //获取所有数据
    public static function getAllCates(){
        return DB::table('cate')->get();
    }

    public static function getCatesInfo($cates,$pid){
        $data=[];
        foreach($cates as $k=>$v){
            if($v['pid']==$pid){
               $v['sub']=self::getCatesInfo($cates,$v['id']);
                $data[]=$v;
            }
        }
        return $data;
    }
}
