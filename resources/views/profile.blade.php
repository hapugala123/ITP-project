@extends('layouts.cus_app')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="{{ url('css/profile.css') }}" rel="stylesheet">

    <!--
User Profile Sidebar by @keenthemes
            A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
            Licensed under MIT
-->

    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar" style="background-color: beige; color: black">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic " style="margin-left: 80px">
                        @if(\Illuminate\Support\Facades\Auth::user()->photo)<a class="img-responsive img-circle" href="{{ \Illuminate\Support\Facades\Auth::user()->photo }}" target="_blank"><img src="{{ \Illuminate\Support\Facades\Auth::user()->photo}}"/></a>@endif
                        {{--<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">--}}
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{\Illuminate\Support\Facades\Auth::user()->role->name}}
                        </div>
                        <div class="profile-usertitle-job">
                            {{\Illuminate\Support\Facades\Auth::user()->email}}
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    @if(Auth::user()->role_id == 2)
                        <div class="profile-userbuttons">

                            <a href="customers/{{Auth::user()->id}}/delete" ><button class="btn btn-danger btn-sm">Delete</button></a>
                            <a href="#" ><button class="btn btn-success btn-sm">Purchase history</button></a>

                        </div>
                @endif
                <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">

                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    {{--{!! Form::model(['method' => 'PUT', 'route' => ['admin.users.update', \Illuminate\Support\Facades\Auth::user()->id], 'files' => true,]) !!}--}}
                    <form method="post" action="{{route('customers.update', \Illuminate\Support\Facades\Auth::user()->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                @lang('quickadmin.qa_edit')
                            </div>

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('name', trans('quickadmin.users.fields.name').'*', ['class' => 'control-label']) !!}
                                        {!! Form::text('name', \Illuminate\Support\Facades\Auth::user()->name, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('name'))
                                            <p class="help-block">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('email', trans('quickadmin.users.fields.email').'*', ['class' => 'control-label']) !!}
                                        {!! Form::label('email', \Illuminate\Support\Facades\Auth::user()->email, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('email'))
                                            <p class="help-block">
                                                {{ $errors->first('email') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('address', trans('quickadmin.users.fields.address').'', ['class' => 'control-label']) !!}
                                        {!! Form::text('address', \Illuminate\Support\Facades\Auth::user()->address, ['class' => 'form-control', 'placeholder' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('address'))
                                            <p class="help-block">
                                                {{ $errors->first('address') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('phone', trans('quickadmin.users.fields.phone').'', ['class' => 'control-label']) !!}
                                        {!! Form::text('phone', \Illuminate\Support\Facades\Auth::user()->phone, ['class' => 'form-control', 'placeholder' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('phone'))
                                            <p class="help-block">
                                                {{ $errors->first('phone') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('bank_account_number', trans('quickadmin.users.fields.bank-account-number').'', ['class' => 'control-label']) !!}
                                        {!! Form::text('bank_account_number', \Illuminate\Support\Facades\Auth::user()->bank_account_number, ['class' => 'form-control', 'placeholder' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('bank_account_number'))
                                            <p class="help-block">
                                                {{ $errors->first('bank_account_number') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('gender', trans('quickadmin.users.fields.gender').'', ['class' => 'control-label']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('gender'))
                                            <p class="help-block">
                                                {{ $errors->first('gender') }}
                                            </p>
                                        @endif

                                        @if(\Illuminate\Support\Facades\Auth::user()->gender == "")
                                            <div>
                                                <label>
                                                    {!! Form::radio('gender', 'male', false, []) !!}
                                                    Male
                                                </label>
                                            </div>
                                            <div>
                                                <label>
                                                    {!! Form::radio('gender', 'female', false, []) !!}
                                                    Female
                                                </label>
                                            </div>
                                            @else

                                            @if(\Illuminate\Support\Facades\Auth::user()->gender == "male")
                                                <div>
                                                    <label>
                                                        {!! Form::radio('gender', 'male', true, []) !!}
                                                        Male
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        {!! Form::radio('gender', 'female', false, []) !!}
                                                        Female
                                                    </label>
                                                </div>
                                            @else
                                                <div>
                                                    <label>
                                                        {!! Form::radio('gender', 'female', true, []) !!}
                                                        Female
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        {!! Form::radio('gender', 'male', false, []) !!}
                                                        Male
                                                    </label>
                                                </div>
                                            @endif
                                        @endif

                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('password', trans('quickadmin.users.fields.password').'*', ['class' => 'control-label']) !!}
                                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('password'))
                                            <p class="help-block">
                                                {{ $errors->first('password') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    {{--<div class="col-xs-12 form-group">--}}
                                    {{--{!! Form::label('role_id', trans('quickadmin.users.fields.role').'*', ['class' => 'control-label']) !!}--}}
                                    {{--{!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control select2', 'required' => '']) !!}--}}
                                    {{--<p class="help-block"></p>--}}
                                    {{--@if($errors->has('role_id'))--}}
                                    {{--<p class="help-block">--}}
                                    {{--{{ $errors->first('role_id') }}--}}
                                    {{--</p>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        @if (\Illuminate\Support\Facades\Auth::user()->photo)
                                            <a href="{{ asset(env('UPLOAD_PATH').'/'.\Illuminate\Support\Facades\Auth::user()->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/'.\Illuminate\Support\Facades\Auth::user()->photo) }}"></a>
                                        @endif
                                        {!! Form::label('photo', trans('quickadmin.users.fields.photo').'', ['class' => 'control-label']) !!}
                                        {!! Form::file('photo', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                                        {!! Form::hidden('photo_max_size', 2) !!}
                                        {!! Form::hidden('photo_max_width', 4096) !!}
                                        {!! Form::hidden('photo_max_height', 4096) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('photo'))
                                            <p class="help-block">
                                                {{ $errors->first('photo') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        {{--{!! Form::close() !!}--}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <center>

    </center>
    <br>
    <br>
@endsection