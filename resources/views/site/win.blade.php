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


        <!-- Button trigger modal -->
        <a type="button" style="-moz-user-select: none;
                                    background: #2a49a5 none repeat scroll 0 0;
                                    border: 1px solid #082783;
                                    box-shadow: 0 1px #4c6bc7 inset;
                                    color: white;
                                    font-size: 19px;
                                    padding: 7px 22px;
                                    text-decoration: none;
                                    cursor: pointer;
                                    position: relative;
                                    top: 30px;" href="#"  data-toggle="modal" data-target="#myModal">
            <i class="fa fa-facebook"></i> | انشر مقالة على صفحة الفيس بوك واشترك بالسحب
        </a>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">شارك المقالة مع اصدقائك واشترك بالسحب</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <textarea placeholder="اكتب تعليق هنا ... " id="textbox" style="width: 100%;"></textarea>
                            <input id="shareUrl" type="hidden" name="url" value="https://www.hangshare.com/{{ $post->urlTitle }}/">
                            <div class="row" style="border: 1px;padding: 5px">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <?php

                                                $cover = json_decode($post->cover);
                                                    ?>
                                            <img class="media-object" width="150"
                                                 src="https://s3-eu-west-1.amazonaws.com/hangshare-media/{{ $cover->image }}"/>
                                        </a>
                                    </div>
                                    <div class="media-body" style="padding: 10px;">
                                        <h4 class="media-heading" style="text-align: right;">{{ $post->title }}</h4>
                                        <p style="font-size: 14px; text-align: right;"><?=  substr(strip_tags($post->body->body),0,150) ?> ...</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
                                <a id="win" href="#" style="-moz-user-select: none;
                                        background: #2a49a5 none repeat scroll 0 0;
                                        color: white;
                                        padding: 7px 22px;
                                      ">
                                    <i class="fa fa-facebook"></i> | انشر مقالة على صفحة الفيس بوك واشترك بالسحب
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
