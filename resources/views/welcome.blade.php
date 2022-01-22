@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('css/master.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome To My Assignment</h1>
            </div>
        </div>
    </div>
</div>
@endsection