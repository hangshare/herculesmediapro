@section('title', trans('app.hometitle') )
@extends('layouts.main')
@section('content')
    <div data-direction="horizontal" data-title="Theme Customizer" data-id="customizer"
         class="normaltopmargin normalbottommargin  light   movingbg  " id="cp-banner"
         style="background-position: 439px 0%;">
        <div class="caption" style="top: -150px;">
            <div class="holder">
                <strong class="title">{{ trans('app.home.h1.top') }}</strong>
                <h1>{{ trans('app.home.h1.bottom') }}</h1>

                <div class="banner-btn-box">
                    <a class="btn-uploading" href="">
                        {{ trans('app.register') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <section class="cp-category cp-photo-box">
        <h2>{{ trans('app.rb7na') }}</h2>
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
        <p>ربما لم تسمع من قبل عن موقع rb7na هذا الموقع اعتقد الكثيرون انه مزحة ولاكن عندما قام بتجربته بعض الاشخاص ربحو الهواتف وبدأو يبلغون اصدقائهم انهم حقا قامو بالدخول للموقع rb7na واتباع خطوات الربح يوجد العديد من الهواتف بل الكثير والكثير نقوم بأرسال الهاتف حتي منزلك في غضون فترة قليلة من 3 الا 7 ايام موقع rb7na له مصدقية من جوجل انك اذا قومت بالبحث عن الموقع في محرك بحث جوجل بكتابة rb7na ستجد موقع rb7na اول نتائج بحث جوجل مما يجعل لنا مصدقية كبيرة جدا من قبل محرك البحث جوجل الاول عالميا ربما لك الفرصة الان ان تربح معنا هاتف يوجد هواتف ايفون من شركة ابل فاهذه الشركة الاولي عالميا في تصنيع الهواتف وايضا بعض الاشياء الاخري مثل جهاز الكمبيوتر المحمول والمزيد ولنا مصدقية من قبل هذه الشركة فانحن نأخذ منها الهواتف بسعر اقل بكثير من نصف مما تشتريه انت بالأسواق والمحلات موقع rb7na  به ايضا هواتف سامسونج وهذه الشركة قامت مؤخرا في السنوات الاخيرة بتصنيع ملاين الهواتف لكثرة شرائها ويوجد العديد من الهواتف ماركات اخري سوف نذكرها لكم في وقت لاحق اعتقد انه عليك بالفوز بهاتف مجانا من خلال موقع rb7na لن تستطيع شراء هاتف في هذه الاوقات كما تري ان اسعار الدولار ترتفع فقد وصل سعر الدولار 13 جنية هذه العملة ستشهد ارتفاع اخر في الايام القليلة القادمة وعندما ترتفع اسعار عملة الدولار سيرتفع ايضا اسعار الهواتف مما يصعب عليك بشراء هاتف حان وقتك للربح من موقع Rb7na</p>
    </section>
@endsection