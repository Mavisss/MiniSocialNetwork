@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Your Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="" action="{{route('profile.update')}}" enctype="multipart/form-data" method="post">
                      @csrf

                      <!-- <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control"
                          name="name" value="">
                        </div>

                      </div> -->



                      <div class="form-group row">
                          <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                          <div class="col-md-6">
                              <input id="role" type="text" class="form-control"
                              name="role" value="{{ $info->role }}" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                          <div class="col-md-6">
                              <input id="address" type="text" class="form-control"
                              name="address" value="{{ $info->address }}" required>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="About" class="col-md-4 col-form-label text-md-right">{{ __('About') }}</label>

                          <div class="col-md-6">
                              <input id="about" type="text" class="form-control"
                              name="about" value="{{ $info->about }}" required>
                          </div>
                      </div>

                      <div class="form-group" style="align-items: center; display: flex; justify-content:center;">
                        <button type="submit" class="btn btn-primary" name="button">Save</button>


                      </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
