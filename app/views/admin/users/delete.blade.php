@extends('admin.dashboard')

{{-- Content --}}
@section('content')

    {{-- Delete User Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($user)){{ URL::to('admin/users/' . $user->id . '/delete') }}@endif" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $user->id }}" />
        <!-- ./ csrf token -->

        <div class="callout callout-danger">
            <h4>This change cannot be undone!</h4>
            <p>Are you sure you want to delete the following user: <strong>{{ $user->username }}?</strong></p>
        </div>
        <div class="col-md-12">
        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
                <a href="{{ URL::to('admin/users') }}"><button type="button" class="btn btn-primary col-md-5 pull-left">No, return me to safety.</button></a>
                <button type="submit" class="btn btn-danger col-md-5 pull-right">Yes, delete </strong>{{ $user->username }}.</button>
            </div>
        </div>
        <!-- ./ form actions -->
        </div>
    </form>
@stop