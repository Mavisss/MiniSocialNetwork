@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h4 style="float: left;">Your Profile</h4>
                  <a href="/profiles/edit/{{ Auth::user()->slug }}" style="float: right;" class="btn btn-info">Edit your profile</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                      <div class="profile-pic">
                          <img src="{{asset('/img/male.png')}}" alt height="145px" width="145px">
                          <a href="">
                            <button class="button" name="button" type="submit">Change Image</button>
                          </a>
                      </div>
                      <h4>{{$user->name}}</h4>
                      <!-- <p>{{Auth::user()->find(Auth::user()->id)->profile->role}}</p> -->
                      <p>{{$profile->role}}</p>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
