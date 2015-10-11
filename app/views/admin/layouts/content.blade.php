<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @if(isset($title))
                {{{ $title }}}
            @endif
            @if(isset($title_description))
                <small>{{{ $title_description }}}</small>
            @endif
        </h1>
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
        {{--</ol>--}}
    </section>
    <div class="error-messages col-md-12">

        @if ( Session::get('error') )
            <div class="callout callout-danger alert-dismissable col-md-12">
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                {{-- Foreach loop has to be implement for user registration errors --}}
                @if(count(Session::get('error')))
                    <ul>
                        @if(is_array(Session::get('error')))
                            @foreach(Session::get('error') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @else
                            <li>{{ Session::get('error') }}</li>
                        @endif
                    </ul>
                @else
                    {{ Session::get('error') }}
                @endif
            </div>
        @endif

        @if ( Session::get('notice') )
            <div class="callout callout-warning alert-dismissable col-md-12">
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                {{ Session::get('notice') }}
            </div>
        @endif

        @if ( Session::get('success') )
            <div class="callout callout-success alert-dismissable col-md-12">
                <h4><i class="icon fa fa-success"></i> Success!</h4>
                {{ Session::get('success') }}
            </div>
        @endif

        @if ( isset($success) )
            <div class="callout callout-success alert-dismissable col-md-12">
                <h4><i class="icon fa fa-success"></i> Success!</h4>
                {{ Session::get('notice') }}
            </div>
        @endif
    </div>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        @yield('content')

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->