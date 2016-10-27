@section('title', $phone->name)
@section('description', $phone->description)
@extends('layouts.main')
@section('content')
    <h1 class="text-center">{{$phone->name}}</h1>
    <div style="width: 100%; height: 300px; overflow: hidden;">
        <img width="100%" style="margin-top: -100px;" class="img-responsive waves-image" src="{{ $phone->image }}">
    </div>
    <div class="container text-center" style="margin-top: 20px;">
        <p style="margin-top: 10px;">{{ trans('app.step1') }}</p>
        <p>{{ trans('app.step2') }}</p>
        {{--<a id="win" style="margin-top: 20px;" class="btn btn-danger btn-lg" href="#">{{ trans('app.registernow') }}</a>--}}

        <a id="win" href="#" style="-moz-user-select: none;
                                    background: #2a49a5 none repeat scroll 0 0;
                                    border: 1px solid #082783;
                                    box-shadow: 0 1px #4c6bc7 inset;
                                    color: white;
                                    font-size: 19px;
                                    padding: 7px 22px;
                                    text-decoration: none;
                                    cursor: pointer;
                                    position: relative;
                                    top: 30px;">
            <i class="fa fa-facebook"></i> | انشر مقالة على صفحة الفيس بوك واشترك بالسحب
        </a>
        <div style="margin-top: 70px">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- responsive - new mobile upper post -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6288640194310142"
                 data-ad-slot="9020008518"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>

    </div>

    <hr/>
    <div class="container">
        <div style="margin-top: 20px">
            <h2><a title="{{ $post->title }}" href="https://www.hangshare.com/{{ $post->urlTitle }}/"
                   target="_blank">{{ $post->title }}</a></h2>
            {!!  $post->body->body !!}
        </div>
    </div>
    <div style="margin-top: 10px">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- responsive - new mobile upper post -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6288640194310142"
             data-ad-slot="9020008518"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    </div>

    <iframe frameborder="0" width="100%" height="5" style=" margin-top:20px; overflow: hidden;"
            src="https://www.hangshare.com/"></iframe>
@endsection
