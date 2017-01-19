@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品分类添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/cate/insert" method='post'>
    	{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">父级分类</label>
    				<div class="mws-form-item">
                        <input class="small" type="text" name='pid' readonly value='{{$list}}'>
    				</div>
    			</div>
    			<div class="mws-form-row">
                    <label class="mws-form-label">子级分类</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name='pname' value='{{old('name')}}'>
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