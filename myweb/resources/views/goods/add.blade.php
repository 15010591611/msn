@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/goods/insert" method='post'>
    	{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">商品名称</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name='goods'>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">单价</label>
    				<div class="mws-form-item">
    					<input class="small" name='price' type="text">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">库存</label>
    				<div class="mws-form-item">
    					<input class="small" name='store' type="text">
    				</div>
    			</div>
    			<div class="mws-form-row bordered">
                    <label class="mws-form-label">简介</label>
                    <div class="mws-form-item">
                        <textarea rows="" cols="" class="small" name='descr'></textarea>
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">类别</label>
    				<div class="mws-form-item">
    					<select class="large">
    						@foreach($cate as $v)
    						<option value="{{$v['id']}}">{{$v['pname']}}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">品牌</label>
    				<div class="mws-form-item">
    					<select class="large">
							@foreach($brand as $val)
    						<option value="{{$val['id']}}">{{$val['brname']}}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">上传图片</label>
    				<div class="mws-form-item clearfix">
    					<input class="fileinput-preview" style="width: 70%; padding-right: 85px;" readonly="readonly" placeholder="No file selected..." name='picname' type="file">
    				</div>
    			</div>
    		</div>
    		<div class="mws-button-row">
    			<input value="Submit" class="btn btn-danger" type="submit">
    			<input value="Reset" class="btn " type="reset">
    		</div>
    	</form>
    </div>    	
</div>
@endsection