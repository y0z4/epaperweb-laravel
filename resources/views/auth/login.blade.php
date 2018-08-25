@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <!-- <center>LOGIN</center> -->
        <center><img src="{{$images}}logotopskor.png" alt="" class="img-responsive"></center>
            <div class="card">
                <div class="lx-main-content">
                        @if(session('warning'))
                        <div class="alert alert-danger" role="alert" style="text-align: center">
                            {{session('warning')}}
                        </div>
                        @endif
                    <div class="container">
                <div class="card-body">
                    
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        <!-- @csrf -->
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary col-md-9">
                                    {{ __('Login') }}
                                </button>

                                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> -->
                            </div>
                        </div>
                        
                        <div class="col row omb_row-sm-offset-3 omb_loginOr" style="margin-left:35%">
                            <div class="col-xs-12 col-sm-6">
                                
                                <span class="omb_spanOr"style="margin-left:35%">or</span>
                                
                            </div>
                        </div>
                        <div style="margin-left:10%">
                          <a href="{{url('/auth/facebook')}}" class="fb tombol btn btn-lg btn-block omb_btn-facebook">
                            <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                           </a>                            
                            <a href="{{url('/auth/google')}}" class="google tombol btn btn-lg btn-block omb_btn-google">
                            <i class="fa fa-google fa-fw"></i> Login with Google
                           </a>
                           <a href="" class="twitter tombol btn btn-lg btn-block omb_btn-twitter">
                            <i class="fa fa-twitter fa-fw"></i> Login with Twitter
                           </a>
                        </div> 
                        
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
