<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Mini Social Network</title>
        <!-- Script -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

        <script src="{{asset('js/ckeditor5/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
        <script src="{{asset('js/ckeditor5/ckeditor5-vue/dist/ckeditor.js')}}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
        <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css">
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            } */

            /* .full-height {
                height: 100vh;
            } */

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {


                right: 10px;
                top: 18px;
            }

            /* .content {
                text-align: center;
            } */

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            #newsfeed {
              margin-top: 20px;
            }

            /* .m-b-md {
                margin-bottom: 30px;
            } */
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          <!-- <div class="top-left links">
              <a href="{{ url('/') }}">Mini Social Network</a>
          </div> -->
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/profiles') }}/{{ Auth::user()->slug }}">Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            @if (Route::has('login'))
              @auth
                <div class="container" style="margin-top: 40px;">
                  <div class="row justify-content-center">
                    <div class="col-md-8">
                      <div class="card-header" id="newsfeed">
                        News Feed
                      </div>
                      @foreach ($allposts as $post)
                      <div class="card" style="margin-top: 10px">

                        <div class="card-body">

                            @include('layouts.all-posts')

                        </div>

                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              @else
                <div class="">
                  abc
                </div>
              @endauth
            @endif
        </div>
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
