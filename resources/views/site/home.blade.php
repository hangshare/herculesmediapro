@section('title', trans('app.hometitle') )
@extends('layouts.main')
@section('content')

    @if (!Auth::check())
        <div data-direction="horizontal" data-title="Theme Customizer" data-id="customizer"
         class="normaltopmargin normalbottommargin  light   movingbg  " id="cp-banner"
         style="background-position: 439px 0%;">
        <div class="caption" style="top: -150px;">
            <div class="holder">
                <strong class="title">{{ trans('app.home.h1.top') }}</strong>
                <h1>{{ trans('app.home.h1.bottom') }}</h1>
                <div class="banner-btn-box">
                    <a rel="home" id="win" href="javascript:;" style="  -moz-user-select: none;
    background: #2a49a5 none repeat scroll 0 0;
    border: 1px solid #082783;
    box-shadow: 0 1px #4c6bc7 inset;
    color: white;
    font-size: 19px;
    padding: 7px 22px;
    text-decoration: none;display: block;cursor: pointer;" >
                        <i class="fa fa-facebook"></i> | سجل باستخدام حساب الفيسبوك
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif

    <section class="cp-category cp-photo-box">
        <h2>{{ trans('app.rb7na') }}</h2>

        <?php
        function sluggable($title)
        {
            if (empty($title))
                die('Error 1');

            $string = strip_tags($title);
            $string = preg_replace('/(?=\P{Nd})\P{L}/u', '-', $string);
            $string = preg_replace('/[\s-]{2,}/u', '-', $string);
            $string = trim($string);
            if (substr($string, 0, 1) == '-')
                $string = ltrim($string, '-');
            if (substr($string, -1) == '-')
                $string = trim($string, "-");
            if (empty($string))
                return 'مقالات-موقع-هانج-شير';
            return $string;
        }
        ?>
        <div class="row">
            @foreach($phones as $phones)
                @include('media.phone', ['phones'=>$phones])
            @endforeach
        </div>
    </section>
    <section class="cp-category cp-photo-box">
        <h2>{{ trans('app.posts') }}</h2>
        <ul>
            @foreach($featured as $featured)
                @include('media.single', ['featured'=>$featured])
            @endforeach
        </ul>
    </section>
    <section class="cp-category cp-photo-box">
        <h2>{{ trans('app.howitworks') }}</h2>
        <p>
            موقع  hercules media هو الموقع الأول الذي يقدم لك خدمة الربح من الانترنت من غير مقابل ، يعمل النظام على شكل سحوبات كل ما عليك فعله هو اختيار الجهاز الذي تود ان تدخل السحب عليه و سوف يقوم الموقع بتسجيلك تلقائيا يمكنك التسجيل بالسحب على جميع الأجهزة يقوم الموقع باحتساب تسجيلك من خلال التسجيل عبر الفيسبوك يجري السحب على جميع الأجهزة في نهاية كل شهر ويقوم النظام عشوائيا باختيار الفائز لكل جهاز ، في حال وقوع الاختيار عليك سوف يقوم فريق العمل بالتواصل معك من خلال البريد الاكتروني للحصول على معلوماتك ولارسال الهاتف الى منزلك.
        </p>
    </section>
@endsection