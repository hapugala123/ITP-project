@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body">
                    {{--@lang('quickadmin.qa_dashboard_text')--}}
                    <div class="col-md-4 text-center" style="background-color: #5c4e75; color: black">
                        <h2 >View Users</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-primary" href="{{ route('admin.users.index') }}" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-4 text-center" style="background-color: #5e5e5e; color: black">
                        <h2>Edit Users</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-primary" href="{{ route('admin.users.index') }}" role="button">View details &raquo;</a></p>
                    </div>
                    <div class="col-md-4 text-center" style="background-color: #8e5fa2; color: black">
                        <h2>Add Users</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-primary" href="{{ route('admin.users.create') }}" role="button">View details &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
