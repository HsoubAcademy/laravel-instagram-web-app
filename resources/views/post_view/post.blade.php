@extends('layouts.app')

@section('content')  
<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8" style="direction:  rtl;text-align: right;">
        <form method="post" action="{{url('post')}}" enctype="multipart/form-data">
          <!-- @csrf -->
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12 mb-6">
              <label for="file_label">قم برفع صورة</label>
              <input type="file" class="form-control" id="file_label" name="filename" required>
            </div>
            <div class="col-md-12 mb-6">
              <label for="post_body">حول الصورة</label>
              <textarea class="form-control" id="post_body" placeholder="" name="body" required></textarea>
              <div class="invalid-feedback">
                قل شيئاً عن الصورة
              </div>
            </div>
          </div>
          <div class="row" style="margin-top:  5%;">
            <div class="col-md-12 mb-6">
              <button class="btn btn-primary btn-lg btn-block" type="submit">نشر الصورة</button>
            </div>  
          </div>  
        </form>
      </div>
    </div>
  </div>
</div>
@endsection