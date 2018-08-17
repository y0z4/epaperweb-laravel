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
                    Hello {{Auth::user()->name}}!<br/>
                    Your email : {{Auth::user()->email}}<br/>
                    You are login using username : {{Auth::user()->username}}
                </div>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
