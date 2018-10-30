@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                        <img src="{{asset('/img/ava1.png')}}" alt height="145px" width="145px">
                        <h4>{{Auth::user()->name}}</h4>
                        <p>{{Auth::user()->role}}</p>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
