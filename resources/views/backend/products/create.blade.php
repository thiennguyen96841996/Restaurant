@extends('backend.layouts.master')
@section('title', 'Product')
@section('style')
{!! Html::style('assets/demo-bower/assets/vendor/selectize/dist/css/selectize.default.css') !!} 
{!! Html::style('assets/demo-bower/assets/vendor/summernote/dist/summernote-bs4.css') !!} 
@endsection
@section('content')
<div class="page-container">
    <div class="main-content">
        <div class="container-fluid">
            <div class="container">
                <div class="well well bs-component">
                    <div class="page-header">
                        <div class="panel-heading">
                        <h2 class="header-title">{{ __('product') }}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="{{ route('manager.home') }}" class="breadcrumb-item"><i class="ti-home p-r-5"></i>{{ __('home') }}</a>
                                <a class="breadcrumb-item" href="{{ route('product.index') }}">{{ __('product') }}</a>
                                <span class="breadcrumb-item active">{{ __('create') }}</span>
                            </nav>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header border bottom">
                            <h4 class="card-title">{{ __('create_product') }}</h4>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['method' => 'POST', 'url' => asset('manager/product')]) !!}
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('name'), null, ['class' => 'control-label']) }}
                                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('category'), null, ['class' => 'control-label']) }}
                                                <select class="form-control" name="categories[]">
                                                    @foreach($categories as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div> 
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('price'), null, ['class' => 'control-label']) }}
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">{{ __('$') }}</span>
                                                    </div>
                                                    {{ Form::text('price', null, ['class' => 'form-control']) }}
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">{{ __('00') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div> 
                                <div class="row m-t-30">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="p-h-10">
                                            <div class="form-group">
                                                {{ Form::label(__('describe'), null, ['class' => 'control-label']) }}
                                                {{ Form::textarea('describe', null, ['class' => 'form-control', 'id' => 'summernote-standard']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>  
                                </div>
                                <div class="text-center">
                                    {{ Form::reset(__('Reset'), ['class' => 'btn btn-default']) }}
                                    {{ Form::submit(__('Add'), ['class' => 'btn btn-success']) }}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{ Html::script('assets/demo-bower/assets/vendor/moment/min/moment.min.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/selectize/dist/js/standalone/selectize.min.js') }}
{{ Html::script('assets/demo-bower/assets/vendor/summernote/dist/summernote-bs4.min.js') }}
{{ Html::script('assets/demo-bower/assets/js/forms/form-elements.js') }}
@endsection
