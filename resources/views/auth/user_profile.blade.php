<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/img/favicons/favicon.ico">

    <title>إنشاء حساب جديد</title>

    <!-- Bootstrap core CSS 
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/fonts/fonts.css') }}" rel="stylesheet">
    <!-- Custom styles for this template 
    <link href="form-validation.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  </head>
 -->
@extends('layouts.app')
@section('content')  
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="form-validation.css" rel="stylesheet">

<div class="row" style="direction:  rtl;text-align:  right;">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <h4 class="mb-3 center">المعلومات الشخصية</h4>
    <form method="post" action="{{action('UserController@update')}}" enctype="multipart/form-data">
      {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
      <div class="row">
        <div class="col-md-6 mb-3">
            <label for="name" class="control-label">الاسم الأول</label>
            <div class="form-group">
                <input id="name" type="text" class="form-control" name="first_name" value="{{$user->first_name}}" required autofocus>
            </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">الاسم الأخير</label>
          <input type="text" class="form-control" id="الاسم الأخير" placeholder="" value="{{$user->last_name}}" name="last_name">
        </div>
      </div>
      <div class="row" dir="ltr">
        <div class="col-md-12 mb-3">
          <label for="birth_date">تاريخ الميلاد</label>
          <input id="datepicker" width="100%" name="birth_date" value="{{$user->birth_date}}" />
          <div class="invalid-feedback">
            أدخل قيمة صحيحة ليوم ميلادك
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-6">
          <img src="{{asset('images/avatar/'.$user->avatar)}}" style="width: 70%;height:  250px;">
        </div> 
        <div class="col-md-6 mb-6">
          <label for="file_label">الصورة الشخصية</label>
          <input type="file" class="form-control" id="file_label" name="filename">
        </div> 
      </div>
      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block" type="submit">حفظ التعديلات</button>
    </form>
  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>
    <script>window.jQuery || document.write('<script src="{{ asset('assets/js/vendor/jquery-slim.min.js') }}"><\/script>')</script>
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/holder.min.js') }}"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
@endsection