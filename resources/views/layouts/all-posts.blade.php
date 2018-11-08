<div class="content">
  <div class="panel-heading panel-heading-divider" >
    <img id="postAvatar" src="{{asset('/img/male3.jpg')}}" alt height="40px" width="40px" style="  border-radius:50%;
      -moz-border-radius:50%;
      -webkit-border-radius:50%;">
    <a href="{{ url('/profiles') }}/{{ $post->slug }}" style="margin-left: 10px">{{$post->name}}</a>
    <div class="dropdown" style="float: right">

        <button class="btn" style="background-color: transparent" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Edit</a>
            <a class="dropdown-item" href="#">Delete</a>
          </div>
    </div>

  </div>
  <div class="panel-body" style="margin: 5px 10px 15px 54px;">
      {!! $post->content !!}
    <div class="interactive">
      <button class="btn" style="background-color: transparent" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-thumbs-up"></i>
          <strong>Like</strong>
        </button>
        <button class="btn" style="background-color: transparent; float: right" type="button">
          {{ $post->comments->count() }} comments
        </button>
        <button class="btn" style="background-color: transparent; float: right" type="button">
          {{ $post->likes->count() }} likes
        </button>

      <div class="input-group">

        <div class="input-group-prepend">
          <span class="input-group-text" style="background-color: transparent">
            <strong><i class="far fa-comment-alt"></i>&nbspComment</strong>
          </span>
        </div>
        <textarea class="form-control" rows="1" ></textarea>
       <!-- Script to make the textarea autoresize -->
        <script type="text/javascript">
        var autoExpand = function (field) {

        	// Reset field height
        	field.style.height = 'inherit';

        	// Get the computed styles for the element
        	var computed = window.getComputedStyle(field);

        	// Calculate the height
        	var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
        	             + parseInt(computed.getPropertyValue('padding-top'), 10)
        	             + field.scrollHeight
        	             + parseInt(computed.getPropertyValue('padding-bottom'), 10)
        	             + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

        	field.style.height = height + 'px';

        };

        document.addEventListener('input', function (event) {
        	if (event.target.tagName.toLowerCase() !== 'textarea') return;
        	autoExpand(event.target);
        }, false);
        </script>
        <style media="screen">
        textarea {
          min-height: 1em;
          max-height: 50vh;
          width: 100%;
        }
        </style>
      </div>
    </div>
  </div>

</div>
