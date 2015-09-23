@extends('admin1.dashboard')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <i class="fa fa-user"></i>
            <h3 class="box-title">Comments</h3>
        </div>
        <div class="box-body">
            <table id="comments" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th class="col-md-3">{{{ Lang::get('admin/comments/table.title') }}}</th>
                    <th class="col-md-3">{{{ Lang::get('admin/blogs/table.post_id') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/users/table.username') }}}</th>
                    <th class="col-md-2">{{{ Lang::get('admin/comments/table.created_at') }}}</th>
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
			oTable = $('#comments').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/comments/data') }}",
//		        "fnDrawCallback": function ( oSettings ) {
//	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
//	     		}
			});
		});
	</script>
@stop