@extends('admin1.dashboard')

{{-- Content --}}
@section('content')


    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($post)){{ URL::to('admin/blogs/' . $post->id . '/delete') }}@endif" autocomplete="off">
        
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $post->id }}" />
        <!-- <input type="hidden" name="_method" value="DELETE" /> -->
        <!-- ./ csrf token -->
        <div class="callout callout-danger">
            <h4>This change cannot be undone!</h4>
            <p>Are you sure you want to delete the following blog post: <strong>{{ $post->title }}?</strong></p>
        </div>
        {{-- Delete Post Form --}}
        <div class="col-md-12">
            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <a href="{{ URL::to('admin/blogs') }}"><button type="button" class="btn btn-primary col-md-5 pull-left">No, return me to safety.</button></a>
                    <button type="submit" class="btn btn-danger col-md-5 pull-right">Yes, delete <strong>{{ $post->title }}.</strong></button>
                </div>
            </div>
        </div>
    </form>
@stop