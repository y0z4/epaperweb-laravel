@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="panel-body">
                    Hello {{$getuser->name}}!<br/>
                    Your email : {{$getuser->email}}<br/>
                    You are login using username : {{$getuser->username}}<br/>
                    And you are login via : {{$getuser->provider}}<br/>
                </div>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
