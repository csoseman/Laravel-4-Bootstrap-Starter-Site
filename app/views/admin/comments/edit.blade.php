@extends('admin1.dashboard')
{{-- Content --}}
@section('content')
    <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Blog Post Comment</h3>
            </div>
            <div class="box-body">
                {{-- Edit Blog Comment Form --}}
                <form class="form-horizontal" method="post" action="" autocomplete="off">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                    <!-- Content -->
                    <div class="form-group {{{ $errors->has('content') ? 'error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="content">Content</label>
                            <textarea class="form-control full-width wysihtml5" name="content" value="content"
                                      rows="10">{{{ Input::old('content', $comment->content) }}}</textarea>
                            {{ $errors->first('content', '<span class="help-inline">:message</span>') }}
                        </div>
                    </div>
                    <!-- ./ content -->

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
