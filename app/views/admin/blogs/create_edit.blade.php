@extends('admin1.dashboard')

@section('content')
    <div class="col-md-8">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Create/Edit Blog Post</h3>
            </div>
            {{-- Edit Blog Form --}}
            <form class="form-horizontal" method="post"
                  action="@if (isset($post)){{ URL::to('admin/blogs/' . $post->id . '/edit') }}@endif"
                  autocomplete="off" role="form">
                <div class="box-body">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                    <!-- Post Title -->
                    <div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="title">Post Title</label>
                            <input class="form-control" type="text" name="title" id="title"
                                   value="{{{ Input::old('title', isset($post) ? $post->title : null) }}}"/>
                            {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <!-- ./ post title -->

                    <!-- Content -->
                    <div class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="content">Content</label>
                                <textarea class="form-control full-width wysihtml5" name="content" value="content"
                                          rows="10">{{{ Input::old('content', isset($post) ? $post->content : null) }}}</textarea>
                            {{ $errors->first('content', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>

                    <!-- Meta Title -->
                    <div class="form-group {{{ $errors->has('meta-title') ? 'error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="meta-title">Meta Title</label>
                            <input class="form-control" type="text" name="meta-title" id="meta-title"
                                   value="{{{ Input::old('meta-title', isset($post) ? $post->meta_title : null) }}}"/>
                            {{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <!-- ./ meta title -->

                    <!-- Meta Description -->
                    <div class="form-group {{{ $errors->has('meta-description') ? 'error' : '' }}}">
                        <div class="col-md-12 controls">
                            <label class="control-label" for="meta-description">Meta Description</label>
                            <input class="form-control" type="text" name="meta-description" id="meta-description"
                                   value="{{{ Input::old('meta-description', isset($post) ? $post->meta_description : null) }}}"/>
                            {{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <!-- ./ meta description -->

                    <!-- Meta Keywords -->
                    <div class="form-group {{{ $errors->has('meta-keywords') ? 'error' : '' }}}">
                        <div class="col-md-12">
                            <label class="control-label" for="meta-keywords">Meta Keywords</label>
                            <input class="form-control" type="text" name="meta-keywords" id="meta-keywords"
                                   value="{{{ Input::old('meta-keywords', isset($post) ? $post->meta_keywords : null) }}}"/>
                            {{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
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
