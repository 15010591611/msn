@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
        <span><i class="icon-th"></i>用户浏览</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        	<div id="DataTables_Table_1_length" class="dataTables_length">
        		<form action="/admin/brand/index" method='get'>
		        	<label>
		        		每页显示<select size="1" name="num" aria-controls="DataTables_Table_1">
		        				<option value="1"
									@if(!empty($request['num']) && $request['num']==1)
										selected
									@endif
		        				>1</option>
		        				<option value="2"
									@if(!empty($request['num']) && $request['num']==2)
										selected
									@endif
		        				>2</option>
		        				<option value="3"
									@if(!empty($request['num']) && $request['num']==3)
										selected
									@endif
		        				>3</option>
		        				</select>
		        				条
		        	</label>
	        	</div>
	        	<div class="dataTables_filter" id="DataTables_Table_1_filter">
		        	<label>
		        		<input aria-controls="DataTables_Table_1" placeholder='品牌名称/属性' name='keyword' type="text">
		        		<input type="submit" class="btn" value='搜索'>
		        	</label>
		        </form>
		    </div>
	        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                    	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 145px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">品牌ID</th>
                    	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 145px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">品牌名称</th>
                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 189px;" aria-label="Browser: activate to sort column ascending">品牌属性</th>
                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 177px;" aria-label="Platform(s): activate to sort column ascending">品牌图片</th>
                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 87px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
            </thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        		@foreach($list as $k=>$v)
	                @if($k%2==0) 
	               		<tr class="odd">
	                @else
	               		<tr class="even">
					@endif
	                <td class="  sorting_1">{{$v['id']}}</td>
	                <td class=" ">{{$v['brname']}}</td>
	                <td class=" ">{{$v['natrue']}}</td>
	                <td class=" "><img src="{{$v['brpic']}}" alt=""></td>
	                <td class=" ">
	                	<a href="/admin/user/del/" class='icon-remove-sign' style="color:red"></a>
	                	&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
	                	<a href="/admin/user/edit/" class='icon-refresh' style="color:green"></a>
	                </td>
				</tr>
                @endforeach
                
            </tbody>
        </table>
        <div class="dataTables_paginate paging_full_numbers" id="page">
        	{!!$list->appends($request)->render()!!}
        </div>
    </div>
</div>
@endsection