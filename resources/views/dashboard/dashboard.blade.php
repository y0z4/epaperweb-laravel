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
                        <center>You are logged in!</center>
                    Hello {{Session::get('name')}}!<br/>
                    Your email : {{Session::get('email')}}<br/>
                    You are login using username : {{Session::get('username')}}<br/>
                    And you are login via : {{Session::get('provider')}}<br/>
                    <center>
                            <a href="{{url('/')}}" class="btn btn-primary col-md-2">
                                <i class="fa fa-home fa-fw"></i> Home
                               </a>   
                    </center>
                </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
