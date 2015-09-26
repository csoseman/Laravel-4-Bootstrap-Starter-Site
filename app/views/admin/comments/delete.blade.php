@extends('admin1.dashboard')

{{-- Content --}}
@section('content')

    {{-- Delete Blog Comment Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($comment)){{ URL::to('admin/comments/' . $comment->id . '/delete') }}@endif" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $comment->id }}" />
        <!-- ./ csrf token -->

        <div class="callout callout-danger">
            <h4>This change cannot be undone!</h4>
            <p>Are you sure you want to delete the following blog post comment: <strong>{{ substr($comment->content, 0, 100) . '...' }}?</strong></p>
        </div>
        {{-- Delete Post Form --}}
        <div class="col-md-12">
            <!-- Form Actions -->
            <div class="form-group">
                <div class="controls">
                    <a href="{{ URL::to('admin/blogs') }}"><button type="button" class="btn btn-primary col-md-5 pull-left">No, return me to safety.</button></a>
                    <button type="submit" class="btn btn-danger col-md-5 pull-right">Yes, delete <strong>{{ substr($comment->content, 0, 100) . '...' }}.</strong></button>
                </div>
            </div>
        </div>
    </form>
@stop