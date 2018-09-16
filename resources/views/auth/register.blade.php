@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="lx-main-content">
                        @if(session('warning'))
                        <div class="alert alert-danger" role="alert" style="text-align: center">
                            {{session('warning')}}
                        </div>
                        @endif
                    <div class="container">
                <div class="card-body">
                    <form method="POST" autocomplete="off" enctype="multipart/form-data" action="{{ url('/register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-form-label text-md-right">Username</label>
                         
                             <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}">
                         
                                @if ($errors->has('username'))
                                   <span class="help-block">
                                      <strong>{{ $errors->first('username') }}</strong>
                                   </span>
                                @endif
                             </div>
                         </div>

                         <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            {{-- <script>
                                function getval(sel)
                                {
                                    alert(sel.value);
                                }
                            </script> --}}
                            <label for="prov" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>

                            <div class="col-md-6">
                                <select name="prov" class="form-control">
                                    <option value="">=== Pilih Provinsi ===</option>
                                    @foreach ($prov as $key=>$value)
                                        
                                    <option value="{{$key}}">{{$value}}</option>
                                    
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <select name="cities" class="form-control"> </select>
                                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('Alamat') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left:40%">
                                <div class="col-md-6">
                                <img src="{{$images}}default.png" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                                
                                <input type="file" name="photo">
                                {{-- @if(!empty($getuser->type=='Manual')) --}}
                                {{-- <img src=" #" style="margin-top: 1%"> --}}
                               
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    {{--  function getval(sel)
    {
        alert(sel.value);
    }  --}}
    $(document).ready(function()
    {
        $('select[name="prov"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: 'https://dev.topskor.id/epaper.topskor.id/register/cities/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                      
                        $('select[name="cities"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="cities"]').append('<option value="'+ key +'">'+ value +'</option>');
                        console.log(data);
                          });
                        
                    }
                });
                
            }else{
                $('select[name="cities"]').empty();
            }
        });
    });
  
  </script>

@endsection
