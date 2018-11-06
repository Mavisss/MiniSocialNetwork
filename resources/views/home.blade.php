@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8  ">
            <div class="card">
                <div class="card-header">Xin chao {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
                      @csrf
                        <!-- <textarea name="content" id="enter-post" rows="8"></textarea> -->

                        @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>{{ $message }}</strong>
                          </div>
                        @elseif ($message = Session::get('errors'))
                          <div class="alert alert-danger alert-block alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  <strong>{{ $message }}</strong>
                          </div>
                        @endif

                        <textarea name="content" id="enter-post"></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#enter-post' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>


                        <div class="text-right" style="margin-top: 10px;">
                          <button class="btn btn-primary btn-sm" type="submit" name="button">Post</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 40px;">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card-header">
        News Feed
      </div>
      @foreach ($posts as $post)
      <div class="card" style="margin-top: 10px">

        <div class="card-body">

            @include('layouts.post')

        </div>

      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
