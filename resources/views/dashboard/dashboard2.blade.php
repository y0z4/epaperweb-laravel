@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="panel-body">
                    {{-- {{dd(session()->all())}} --}}
                        <center>You are logged in!</center>
                        {{-- {{print_r($getuser)}} --}}
                        @php
                        $user = DB::table('users')
                                ->where('id','=',Session::get('id'))
                                ->first();
                            
                        @endphp
                        @if (!empty(Session::get('image')))
                        <center><img src="{{$user->image}}" height="100" width="100"></center>
                        @else
                        <center><img src="{{$images}}default.png" height="100" width="100"></center>
                        @endif
                        
                        {{--  <center><img src="{{Session::get('image')->image}}"></center>  --}}
                    Hello {{$user->name}}!<br/>
                    
                    {{-- You are login using username : {{Session::get('username')}}<br/> --}}
                    Login via : {{$user->provider}}<br/>
                    Email : {{$user->email}}<br/>
                    Phone : {{$user->phone}}<br/>
                    Jenis Kelamin : {{$user->gender}}<br/>
                    Alamat : {{$user->address}}<br/>
                    
                    
                    @php
                    use App\City;
                    use App\Province;
                    $prov_name=Province::where('id','=',$user->provinsi_id)
                                        ->pluck("name");
                    $name_prov = str_replace(array('[',']','"'), "", $prov_name);
                    $city_name=City::where('id','=',$user->city_id)
                                                ->pluck("city_name");
                    $name_city = str_replace(array('[',']','"'), "", $city_name); 
                    @endphp
                    {{$name_city}}<br/>
                    {{$name_prov}}<br/>
                    
                    <center>
                            <a href="{{url('/')}}" class="btn btn-primary col-md-2">
                                <i class="fa fa-home fa-fw"></i> Home </a>
                            <a href="#modalEdit" class="btn btn-primary col-md-2" data-toggle="modal">
                                <i class="fa fa-cog fa-fw"></i> Edit Profile </a>
                            <a href="{{ url('/logout') }}" class="btn btn-primary col-md-2" data-toggle="modal" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </center>
                </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal-->
<div class="modal fade" id="modalEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile</h4>
                @php
                use App\User;
                $user = User::where('id','=',Session::get('id'))
                        ->first();
                    
                @endphp
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{url('/edit/editaction')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="messages" style="padding-top: 2%"></div>
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{session('id')}}">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Email</label>
                    <input type="text" name="email" class="form-control" readonly value="{{$user->email}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Phone</label>
                    <input type="number" name="phone" class="form-control" value="{{$user->phone}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">{{$user->gender}}</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                </div>
            </div>

            {{--  <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Jenis Kelamin</label>
                    <input type="text" name="gender" class="form-control" value="{{Session::get('gender')}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>  --}}
            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <select name="prov" id="prov" class="form-control">
                            
                            @php
                            
                            use Illuminate\Support\Facades\Input;
                            $prov = Province::orderBy("provinsi.id","ASC")
                                    ->pluck("name","id"); 
                            $prov_id=Input::get('id_provinsi');
                            $city=City::where('id_provinsi','=',$prov)->get();
                            $prov_name=Province::where('id','=',$user->provinsi_id)
                                        ->pluck("name");
                            $name = str_replace(array('[',']','"'), "", $prov_name);
                                                                                        
                            @endphp

                            <option value="">{{$name}}</option>  
                            {{-- <option value="">{{$prov->name}}</option> --}}
                            @foreach ($prov as $key=>$value)
                                        
                                    <option value="{{$key}}">{{$value}}</option>
                                    
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                        <div class="form-group">
                            <label for="city">Kota</label>
                            <select name="cities" class="form-control"> 
                            @php
                            
                            $city_name=City::where('id','=',$user->city_id)
                                                ->pluck("city_name");
                            $name = str_replace(array('[',']','"'), "", $city_name);   
                            @endphp
                            <option value="">{{$name}}</option>
                            </select>
                        </div>
                    </div>
            


             <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{$user->address}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_email">Foto</label>
                    <input type="file" name="photo">
                    <img src="{{$user->image}}" height="100" width="100">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success" style="margin-left: 1%">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    url: 'https://dev.topskor.id/epaper.topskor.id/dashboard/cities/'+provID,
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
