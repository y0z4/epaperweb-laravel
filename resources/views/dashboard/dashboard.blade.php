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
                        <center><img src="{{Session::get('image')}}" height="100" width="100"></center>
                        {{--  <center><img src="{{Session::get('image')->image}}"></center>  --}}
                    Hello {{Session::get('name')}}!<br/>
                    Your email : {{Session::get('email')}}<br/>
                    You are login using username : {{Session::get('username')}}<br/>
                    And you are login via : {{Session::get('provider')}}<br/>
                    <center>
                            <a href="{{url('/')}}" class="btn btn-primary col-md-2">
                                <i class="fa fa-home fa-fw"></i> Home                              </a>
                               <a href="#modalEdit" class="btn btn-primary col-md-2" data-toggle="modal">
                                <i class="fa fa-cog fa-fw"></i> Edit Profile
                               </a>      
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
                    <input type="text" name="name" class="form-control" value="{{Session::get('name')}}">
                    
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="{{session('id')}}">
        <div class="row">
            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Email</label>
                    <input type="text" name="email" class="form-control" readonly value="{{Session::get('email')}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Jenis Kelamin</label>
                    <input type="text" name="gender" class="form-control" value="{{Session::get('gender')}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

             <div class="col-md-10 col-sm-10 col-xs-10" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_name">Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{Session::get('address')}}">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-6" style="margin-left: 1%">
                <div class="form-group">
                    <label for="form_email">Foto</label>
                    <input type="file" name="photo">
                    <img src="{{Session::get('image')}}" height="100" width="100">
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
@endsection
