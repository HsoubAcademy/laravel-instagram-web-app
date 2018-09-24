<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.header')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
              <h1 class="jumbotron-heading"></h1>
              <p class="lead text-muted">قم بمشاركة جميع صورك وفيديوهاتك أنت وأصدقائك من خلال شبكة انستغرام حسوب</p>
              <p style="direction: rtl;">
                <a href="{{url('home')}}" class="btn btn-{{ isset($active_home) ? $active_home : 'secondary' }} my-2">الرئيسية</a>
                <a href="{{url('user/followers')}}" class="btn btn-{{ isset($active_follow) ? $active_follow : 'secondary' }} my-2">المتابعين</a>
                <a href="{{url('users')}}" class="btn btn-{{ isset($active_user) ? $active_user : 'secondary' }} my-2">المستخدمين</a>
                <a href="{{url('user/posts')}}" class="btn btn-{{ isset($active_profile) ? $active_profile : 'secondary' }} my-2">الملف الشخصي</a>
              </p>
            </div>
        </section>    
        @yield('content')
    </main>
    @include('layouts.footer')
</html>
