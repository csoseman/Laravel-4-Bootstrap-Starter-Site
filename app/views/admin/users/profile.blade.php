@extends('admin.dashboard')

@section('content')
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">User Profile</h3>
            </div><!-- /.box-header -->
            {{-- Create User Form --}}
            <form class="form-horizontal" method="post" action="" autocomplete="off">
            <div class="box-body">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <!-- ./ csrf token -->
                {{ Form::hidden('id', $user->id) }}

                <!-- first name -->
                <div class="form-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="username">First Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="first_name" id="first_name" disabled="disabled" value="{{{ Input::old('first_name', isset($user) ? $user->first_name : null) }}}" />
                        {{ $errors->first('first_name', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ first name -->

                <!-- last name -->
                <div class="form-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="username">Last Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="last_name" id="last_name" disabled="disabled" value="{{{ Input::old('last_name', isset($user) ? $user->last_name : null) }}}" />
                        {{ $errors->first('last_name', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ last name -->

                <!-- username -->
                <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="username">Username</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="username" id="username" disabled="disabled" value="{{{ Input::old('username', isset($user) ? $user->username : null) }}}" />
                        {{ $errors->first('username', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ username -->

                <!-- Email -->
                <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="email">Email</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="email" id="email" disabled="disabled" value="{{{ Input::old('email', isset($user) ? $user->email : null) }}}" />
                        {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ email -->

                <!-- Password -->
                <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="password">Password</label>
                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password" id="password" value="" />
                        {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ password -->

                <!-- Password Confirm -->
                <div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
                    <div class="col-md-10">
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
                        {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
                    </div>
                </div>
                <!-- ./ password confirm -->

                <!-- Groups -->
                <div class="form-group {{{ $errors->has('roles') ? 'error' : '' }}}">
                    <label class="col-md-2 control-label" for="roles">Roles</label>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Permission</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user->roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <ul>
                                        @foreach($role->perms as $permission)
                                            <li>{{ $permission->display_name }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <ul>
                        </ul>
                    </div>
                </div>
                <!-- ./ groups -->
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <button type="reset" class="btn btn-danger pull-left">Reset</button>
            </div>
            </form>
        </div>
    </div>
@stop
