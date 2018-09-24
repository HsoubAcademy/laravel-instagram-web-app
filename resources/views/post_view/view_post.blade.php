@extends('layouts.app')

@section('content')  
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="card mb-8 box-shadow">             
            @php
              $date=date('Y-m-d', $post['date']);
            @endphp
          <div class="card-header" style="background-color:  white;">
             <div class="media text-muted pt-3" style="direction:  rtl;">
                <img src="{{asset('images/avatar/'.$post->user->avatar)}}" alt="" class="col-sm-2 rounded" style="margin-right: -3%; width: 50px;height: 50px;">
                <div class="media-body pb-3 mb-0" style="text-align: right;direction:  rtl;" >
                  <p class="card-text" style="text-align: right;direction:  rtl;">{{$post->user['name']}}</p>
                </div>
                @can('update', $post)
                  <form action="{{action('PostController@destroy', $post['id'])}}" method="post" id="ajax_unlike">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-sm btn-outline-secondary" >حذف</button>
                  </form>
                @endcan
              </div>
          </div>  
          <img class="card-img-top" src="{{asset('images/'.$post['image_path'])}}" alt="Card image cap">
          <div class="card-body">
            <p class="card-text" style="text-align: right;direction:  rtl;">{{$post['body']}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="row">
                  <div class="btn-group" style="margin-top:  4px;">
                    <button class="btn btn-sm btn-outline-secondary" type="button" ><i class="fa fa-heart" style="margin-right:  10%;"></i><label id="count_id">{{$count}}</label></button> 
                    <button class="btn btn-sm btn-outline-secondary" id="btn_value_id" onclick="like_action()"> أعجبني </button>
                  </div>
              </div>
              <small class="text-muted">{{$post['created_at']}}</small>
            </div>
          </div>
          <div class="card-footer" style="direction:  rtl;text-align:  right;">
          	<div class="media text-muted pt-3">
              <img src="{{asset('images/avatar/'.auth()->user()->avatar)}}" alt="" class="col-sm-2 rounded" style="margin-top:  1%;margin-right: -3%; width: 50px;height: 50px;">
              <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" >
                <div class="d-flex justify-content-between align-items-center w-100">
                  <strong class="text-gray-dark">{{auth()->user()->name}}</strong>
                </div>
                <form action="{{ url('comment') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="post_id" value="{{$post['id']}}">
                  <div class="row">
                    <div class="col-md-10">
                      <input type="text" name="comment" class="form-control" placeholder="أضف تعليقاً" style="width:  100%;">
                    </div>
                    <div class="col-md-2" style="margin-top:  4px;">  
                      <input type="submit" class="btn btn-sm btn-outline-secondary" name="send" value="إضافة التعليق">
                    </div>  
                  </div>
                </form> 
              </div>
            </div>
            @foreach ($post_comments->comments as $comment)
              <div class="media text-muted pt-3">
                <img src="{{asset('images/avatar/'.$comment->user->avatar)}}" alt="" class="col-sm-2 rounded" style="margin-top:  1%;margin-right: -3%; width: 50px;height: 50px;">
                <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray" >
                    <div class="d-flex justify-content-between align-items-center w-100">
                      <strong class="text-gray-dark">{{$comment->user->name}}</strong><br>
                  @if($comment->user->id==auth()->user()->id)
                      <form action="{{action('CommentController@destroy', $comment->id)}}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <input type="submit" class="btn btn-outline-danger" value="حذف التعليق">
                      </form>  
                  @endif
                    </div>
                  <span class="d-block">{{$comment->comment}}</span>
                </div>
              </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
<script type="text/javascript">
  var like= "أعجبني";
  var unlike= "إلغاء الاعجاب";
  var token = '{{csrf_token()}}';
  var post_id = "{{$post['id']}}";
  var like_id = 0;

  @if(sizeof($userLike)==1)
    like_id = "{{$userLike[0]->id}}";
    $('#btn_value_id').html(unlike);
  @endif
  
  function like_action(){
   
    if(like_id == 0){
      $.ajax({
          type: "POST",
          url: "{{ url('like') }}",
          data: {post_id: post_id, _token: token},
          success: function( msg ) {
              $('#count_id').html(msg.count);
              $('#btn_value_id').html(unlike);
              like_id = msg.id;
          }
      });
    }
    else{
      $.ajax({
          type: "POST",
          url: "{{ url('like') }}/"+like_id+"?post_id="+post_id,
          data: {post_id: post_id, _token: token, _method:"DELETE"},
          success: function( msg ) {
              $('#count_id').html(msg.count);
              $('#btn_value_id').html(like);
              like_id =0;
          }
      });
    }
  }
</script>
@endsection

