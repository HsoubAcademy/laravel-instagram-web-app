@extends('layouts.app')
@section('content')
<div class="album py-5 bg-light">
  <div class="container"> 
    <div class="row" style="direction:  rtl;text-align:  right;">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <h4 class="mb-3 center">المعلومات الشخصية</h4>
        <div class="row">
          <div class="col-md-3 mb-3">
            <img src="{{asset('images/avatar/'.$user->avatar)}}" style="width: 100%;height: 140px;">
          </div>  
          <div class="col-md-6 mb-6">
              <h2 id="name">{{$user->first_name}} {{$user->last_name}}</h2>
              <h3 id="birth_date">{{$user->birth_date}}</h3>
              <button class="btn btn-sm btn-outline-secondary" type="button" style="width:  60%;"><i class="fa fa-bullhorn"></i> | قام بنشر {{$posts_counts}} منشور!</button> 
              <br>
              <button class="btn btn-sm btn-outline-secondary" type="button" style="width:  60%;"><i class="fa fa-heart"></i> | حصد {{$likes_counts}} إعجاب</button> 
          </div>
          <div class="col-md-3 mb-3">
            @if(isset($is_follower[0]) && $is_follower[0]->accepted==1)
              <button class="btn btn-sm btn-outline-info" type="button" style="width:  100%;" onclick="location.href='{{url('user/'.$user->id.'/posts')}}';"><i class="fa fa-eye"></i> عرض الصفحة الشخصية</button>
            @elseif(isset($is_follower[0]) && $is_follower[0]->accepted==0)
              <button class="btn btn-sm btn-outline-warning" type="button" style="width:  100%;"><i class="fa fa-paper-plane"></i>تم ارسال الطلب من قبل</button>
            @else
              <form method="POST" action="{{url('follow')}}">
                  <input type="hidden" name="user_id" value="{{$user->id}}">
                {{ csrf_field() }}
                  <button class="btn btn-sm btn-outline-success" style="width:  100%;"><i class="fa fa-paper-plane"></i> إرسال طلب متابعة</button>
              </form>  
            @endif  
          </div>
        </div>
        <div class="row">
           @foreach ($posts as $post)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{asset('images/'.$post['image_path'])}}" alt="Card image cap" style="height: 166px">
                <div class="card-body" style="height:  50px;">
                  <p class="card-text" style="text-align: right;direction:  rtl;">{{str_limit($post['body'], 30)}}</p>
                  <br>
                </div>
                <div class="card-footer">
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{$post['created_at']}}</small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>  
</div>
@endsection