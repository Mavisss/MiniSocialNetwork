<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<!-- <script src="{{asset('js/ckeditor.js')}}"></script> -->
<!-- <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script> -->

<script src="http://bootstrap-notify.remabledesigns.com/js/bootstrap-notify.min.js" charset="utf-8"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>







<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="{{asset('/css/animate.css')}}"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css"> -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css">



<!-- Custom Script -->
<!-- <script type="text/javascript">
  $(document).ready(function(){
    @if(session()->has('success'))
      notify('', '{{session()->get("success")}}', 'success');
    @endif
    @if(session()->has('errors') && is_array(session()->get('errors')))
      @foreach(session()->get('errors') as $error)
        notify('', '{{$error}}', 'danger');
      @endforeach
    @endif
  });

  function notify(title, message, type){
    $notify({
      title: title,
      message: message,
    },{
      type: type,
      placement:{
        align: 'center'
      },
      delay:2000,
    });
  }
</script> -->
