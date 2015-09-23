@extends('admin1.dashboard')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <div class="pull-right box-tools">
                <a href="{{{ URL::to('admin/roles/create') }}}" class="btn btn-primary btn-sm iframe">
                    <span class="fa fa-plus-circle"></span> Create
                </a>
                <a href="#" onClick="oTable.fnReloadAjax()" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></a>
            </div>
            <i class="fa fa-user"></i>
            <h3 class="box-title">Groups</h3>
        </div>
        <div class="box-body">
            <table id="roles" class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th class="col-md-6">{{{ Lang::get('admin/roles/table.name') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/roles/table.users') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/roles/table.created_at') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {
				oTable = $('#roles').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/roles/data') }}",
//		        "fnDrawCallback": function ( oSettings ) {
//	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
//	     		}
			});
		});
	</script>
@stop