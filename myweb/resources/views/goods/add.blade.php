@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/goods/insert" method='post' enctype="multipart/form-data">
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
                <div class="mws-form-row">
                    <label class="mws-form-label">网页标题</label>
                    <div class="mws-form-item">
                        <input class="small" name='title' type="text">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">关键字</label>
                    <div class="mws-form-item">
                        <input class="small" name='keywords' type="text">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">上架时间</label>
                    <div class="mws-form-item">
                        <input class="small" name='uptime' placeholder='请明确到年月日时分' type="text">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">下架时间</label>
                    <div class="mws-form-item">
                        <input class="small" name='downtime' placeholder='请明确到年月日时分' type="text">
                    </div>
                </div>
    			<div class="mws-form-row bordered">
                    <label class="mws-form-label">描述</label>
                    <div class="mws-form-item">
                        <textarea rows="" cols="" class="small" name='description'></textarea>
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
    					<select class="large" name='typeid'>
    						@foreach($cate as $v)
    						<option value="{{$v['id']}}">{{$v['pname']}}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">品牌</label>
    				<div class="mws-form-item">
    					<select class="large" name='brandid'>
							@foreach($brand as $val)
    						<option value="{{$val['id']}}">{{$val['brname']}}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">上传图片</label>
    				<div class="mws-form-item clearfix">
                        <input class="fileinput-preview" style="width: 70%; padding-right: 85px;" readonly="readonly" placeholder="没有文件被上传" name='picname' type="file">
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">备注</label>
                    <div class="mws-form-item">
                        <input class="small" name='make' type="text"><span>（请管理人员添加后填写您的名字，添加时间）</span>
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