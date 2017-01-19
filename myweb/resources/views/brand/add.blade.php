@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>品牌添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/brand/insert" method='post' enctype="multipart/form-data">
    	{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">品牌名称</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name='brname' value='{{old('brname')}}'>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">品牌属性</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name='natrue' value='{{old('natrue')}}'>
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">上传品牌图片</label>
    				<div class="mws-form-item">
    					<input class="fileinput-preview" style="width: 70%; padding-right: 85px;" readonly="readonly" placeholder="No file selected..." name='brpic' type="file">
    				</div>
    			</div>
    		<div class="mws-button-row">
    			<input value="提交" class="btn btn-danger" type="submit">
    			<input value="重置" class="btn " type="reset">
    		</div>
    	</form>
    </div>    	
</div>

@endsection