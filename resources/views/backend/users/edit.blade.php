@extends('backend.layouts.master')
@section('title', 'Edit a user')
@section('content')

<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="container">
                <div class="well well bs-component">
                    <div class="page-header">
                        <h2 class="header-title">{{ __('user') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('manager.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('users.index') }}">{{ __('users') }}</a>
                                <span class="breadcrumb-item active">{{ __('edit') }}</span>
                            </nav>
                        </div>
                    </div>
                    {!! Form::model($user, ['route' => ['users.update', $user->id]]) !!}
                        {{ method_field('PUT') }}
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <fieldset>
                            <div class="card">
                                <div class="card-body"> 
                                    <legend class="text-center">  {{ __('Edit Information') }} </legend>
                                    <hr>
                                    <div class="form-group">
                                        {{ Form::label(__('name'), null, ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-12">
                                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name' ]) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label(__('email'), null, ['class' => 'col-lg-2 control-label']) }}  

                                        <div class="col-lg-12">
                                            {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email' ]) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label(__('role'), null, ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-12">
                                            {{ Form::select('role', ['employee' => __('employee_1'), 'manager' => __('manager')], null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label(__('Change_Password'), null, ['class' => 'col-lg-3 control-label']) }}
                                        <div class="col-lg-12">
                                            {{ Form::checkbox('changepassword', null, false, ['id' => 'changepassword']) }}
                                            {{ Form::password('password', ['class' => 'form-control password', 'required' => '', 'placeholder' => 'Password', 'disabled' => 'disabled' ]) }}
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('password') as $repeatpassword)
                                                    <li>{{ $password }}</li>
                                                @endforeach
                                            </ul>
                                        
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        {{ Form::label(__('Confirm_Password'), null, ['class' => 'col-lg-3 control-label']) }}
                                        <div class="col-lg-12">
                                            {{ Form::password('repeatpassword', ['class' => 'form-control password', 'required' => '', 'placeholder' => 'Confirm Password', 'disabled' => 'disabled' ]) }}
                                        </div>
                                    </div>
                                    @if ($errors->has('repeatpassword'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->get('repeatpassword') as $repeatpassword)
                                                    <li>{{ $repeatpassword }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        {{ Form::label(__('phone'), null, ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-12">
                                            {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => 'Phone Number' ]) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label(__('sex'), null, ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-12">
                                            {{ Form::select('sex', ['0' => __('male'), '1' => __('female')], null, ['class' => 'form-control']) }}  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label(__('address'), null, ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-12">
                                            {{ Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Address' ]) }}
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        {{ Form::reset(__('Cancel'), ['class' => 'btn btn-warning']) }}
                                        {{ Form::submit(__('Submit'), ['class' => 'btn btn-success']) }}
                                        <!-- <button type="reset" class="btn btn-warning btn-warning">Cancel</button> -->
                                        <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#changepassword').change(function() {
                if($(this).is(':checked')) {
                    $('.password').removeAttr('disabled');
                }
                else{
                    $('.password').attr('disabled', '');
                }
            });
        });
    </script>
@endsection

@section('script')
    {{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/jquery.dataTables.js') }}
    {{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}
    {{ Html::script('assets/demo-bower/assets/js/tables/data-table.js') }}
@endsection
