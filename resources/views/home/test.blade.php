@extends("home.countCommon")
@section("count")
    <script>ls_count('appid','secret');</script>
    总访问量:<span id="ls_count"></span>, 页面访问量<span id="page_count"></span>
@endsection