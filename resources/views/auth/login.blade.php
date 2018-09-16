@extends('layouts.app')
<style>
body{
  overflow: hidden;
}
</style>
@section('content')
<div class="login-page">
        <div align="center"><img src="{{$images}}logotopskor.png" alt="" class="img-responsive"></div>
        @if(session('warning'))
            <div class="alert alert-danger" role="alert" style="text-align: center">{{session('warning')}}</div>
        @endif
    <div class="form">
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            <!-- @csrf -->
            {{csrf_field()}}
      <?php /*
      <form class="register-form">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      */ ?>
      <form class="login-form">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required autofocus/>
        @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="password"required>
        @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif

        <button type="submit">{{ __('Login') }}</button>
        <p class="message">Not registered? <a href="{{ url('/register') }}">Create an account</a></p>
    </form>
    <div class="line-man"><span>Atau login menggunakan</span></div>
    <div class="social-media">
        <a href="{{url('/auth/facebook')}}" class="fb tombol btn btn-lg btn-block omb_btn-facebook">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a> <br>                           
          <a href="{{url('/auth/google')}}" class="google tombol btn btn-lg btn-block omb_btn-google">
          <i class="fa fa-google fa-fw"></i> Login with Google
         </a>
      </div>
    </div>
  </div>
@endsection
