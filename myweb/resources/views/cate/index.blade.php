@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
        <span><i class="icon-th"></i>商品分类浏览</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        	<div id="DataTables_Table_1_length" class="dataTables_length">
        		
		    </div>
	        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info" >
                <thead>
                    <tr role="row">
                    	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 145px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">分类ID</th>
                    	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 145px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">分类名称</th>
                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 189px;" aria-label="Browser: activate to sort column ascending">父级ID</th>
                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 189px;" aria-label="Browser: activate to sort column ascending">父级名称</th>
                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 177px;" aria-label="Platform(s): activate to sort column ascending">PATH</th>
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
	                <td class="  sorting_1" style="text-align:center;">{{$v['id']}}</td>
	                <td style="text-align:center;">{{$v['pname']}}</td>
	                <td style="text-align:center;">{{$v['pid']}}</td>
	                <td style="text-align:center;">{{\App\Http\Controllers\CateController::prname($v['pid'])}}</td>
	                <td style="text-align:center;">{{$v['path']}}</td>
	                <td style="text-align:center;">
	                	<a href="/admin/cate/del/{{$v['id']}}" class='icon-remove-sign' style="color:red"></a>
	                	<a href="/admin/cate/add/{{$v['id']}}" class='icon-plus-sign' style="color:#ccc"></a>
	                	<a href="/admin/cate/edit/{{$v['pid']}}" class='icon-refresh' style="color:green"></a>
	                </td>
				</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection