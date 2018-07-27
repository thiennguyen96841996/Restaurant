@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="form-login">
        <div class="card">
            <div class="card-header border bottom">
                <h4 class="card-title">{{ __('login') }}</h4>
            </div>
            {{ Form::open(['method' => 'POST', 'url' => 'login' ]) }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                {{ Form::email('email', old('email'), ['class' => 'form-control', 'id' => 'email', 'required' => 'true', 'autofocus' => 'autofocus']) }}
                                @if ($errors->has('email'))
                                    <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password', 'required' => 'true']) }}
                                @if ($errors->has('password')) 
                                    <strong>{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <!-- <input id="formRowCheckbox1" type="checkbox">
                                            <label for="formRowCheckbox1" name="remember" {{ old('remember') ? 'checked' : '' }}>{{__('Remember Me')}}</a></label> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-right">
                                    {{ Form::submit(  __('Login') , array('class' => 'btn btn-gradient-success')) }}
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot password') }}
                                        </a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
