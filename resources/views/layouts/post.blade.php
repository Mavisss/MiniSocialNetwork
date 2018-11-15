<div class="content">
  <div class="panel-heading panel-heading-divider" >
    <img id="postAvatar" src="{{asset('/img/male3.jpg')}}" alt height="40px" width="40px" style="  border-radius:50%;
      -moz-border-radius:50%;
      -webkit-border-radius:50%;">
    <a href="#" style="margin-left: 10px">{{Auth::user()->name}}</a>
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
        <textarea id="homePostCommentTxt" class="form-control" rows="1" ></textarea>
      </div>
    </div>
  </div>

</div>
