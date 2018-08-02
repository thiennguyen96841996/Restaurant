@extends('backend.layouts.master')
@section('title', 'Users')
@section('style')
{!! Html::style('assets/demo-bower/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') !!} 
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <h2 class="header-title">{{ __('user') }}</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="{{ route('manager.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                        <a class="breadcrumb-item" href="{{ route('users.index') }}">{{ __('users') }}</a>
                        <span class="breadcrumb-item active">{{ __('index') }}</span>
                    </nav>
                </div>
            </div>  
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-overflow">
                        <table id="dt-opt" class="table table-hover table-xl">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="checkbox p-0">
                                            {{ Form::checkbox('checkAll', null, null, [ 'class' => 'checkAll','id' => 'selectable1']) }}
                                            <!-- <input id="selectable1" type="checkbox" class="checkAll" name="checkAll"> -->
                                            {{ Form::label(null, null, null, ['for' => 'selectable1']) }}
                                            <!-- <label for="selectable1"></label> -->
                                        </div>
                                    </th>
                                    <th>{{ __('STT') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('email') }}</th>
                                    <th>{{ __('phone') }}</th>
                                    <th>{{ __('address') }}</th>
                                    <th>{{ __('sex') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody> 
                                @php
                                    $stt = 1;
                                @endphp
                                @foreach($users as $value)
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                {{ Form::checkbox(null, null, false, [ 'id' => 'selectable2']) }}
                                                <!-- <input id="selectable2" type="checkbox"> -->
                                                {{ Form::label(null, null, ['for' => 'selectable2']) }}
                                                <!-- <label for="selectable2"></label> -->
                                            </div> 
                                        </td>
                                        <td>{{ $stt++ }}</td>
                                        <td>
                                            <div class="list-media">
                                                <div class="list-item">
                                                    <div class="media-img">
                                                        <img src="{{ asset(config('app.img') . $value->avatar) }}" alt=" ">
                                                    </div>
                                                    <div class="info">
                                                        <span class="title"><a href="{{ route('users.show', $value->id) }}">{!! $value->name !!}</a></span>
                                                        <span class="sub-title">{{ $value->part }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <td>{!! $value->email !!}</td>
                                        <td>{!! $value->phone !!}</td>
                                        <td>{!! $value->address !!}</td>
                                        <td>{{ ($value->sex == 0)? 'Male' : 'Female' }}</td>
                                        <td class="text-center font-size-18">
                                        <a href="{{ route('users.edit', $value->id) }}" class="btn btn-warning btn-rounded swal-function">{{ __('update') }}</a>
                                            {!! Form::model($users, ['route' => ['users.destroy', $value->id]]) !!}
                                            {{ method_field('DELETE') }}
                                            {{ Form::submit(__('delete'), ['class' =>'btn btn-danger btn-rounded swal-pass-param']) }}
                                            {!! Form::close() !!}
                                        </td>
                                        <!-- <button class="btn btn-danger btn-rounded swal-pass-param">Try Me</button> -->
                                    </tr>
                                @endforeach
                            </tbody>                        
                        </table>
                    </div> 
                </div>       
            </div>  
            <div class="creat_button text-right">
                <a href="{{ route('users.create') }}" class="btn btn-success">{{ __('Add Employee') }}</a>
            </div> 
        </div>
    </div>
</div>
@endsection

@section('script')
    {{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/jquery.dataTables.js') }}
    {{ Html::script('assets/demo-bower/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}
    {{ Html::script('assets/demo-bower/assets/js/tables/data-table.js') }}
@endsection
