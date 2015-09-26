@extends('admin1.dashboard')

{{-- Content --}}
@section('content')

    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Group</h3>
            </div>
            <form class="form-horizontal" method="post" action="" autocomplete="off">
                <div class="box-body">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                    <!-- Name -->
                    <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
                        <label class="col-md-2 control-label" for="name">Name</label>

                        <div class="col-md-10">
                            <input class="form-control" type="text" name="name" id="name"
                                   value="{{{ Input::old('name', $role->name) }}}"/>
                            {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>
                    <!-- ./ name -->
                </div>
                <!-- ./ general tab -->
                <div class="form-group">
                    @foreach ($permissions as $permission)
                        <div class="col-md-10 col-md-offset-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="permissions[{{{ $permission['id'] }}}]"
                                           name="permissions[{{{ $permission['id'] }}}]"
                                           value="1"{{{ (isset($permission['checked']) && $permission['checked'] == true ? ' checked="checked"' : '')}}} />
                                    {{{ $permission['display_name'] }}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Form Actions -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="reset" class="btn btn-danger pull-left">Reset</button>
                </div>
                <!-- ./ form actions -->
            </form>
        </div>
    </div>
@stop
