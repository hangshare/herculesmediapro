<header id="header">
    <section class="logo-row">
        <div class="container text-center">
            <div class="row">
                <div class="col-xs-2">
                    @if (Auth::check())
                        <a style="font-size: 25px; color: #d94350;" href="{{url('/user/'.Auth::user()->id)}}">
                            {{ 'الصفحة الشخصية' }}
                        </a>
                    @endif
                </div>
                <div class="col-xs-8">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- responsive - new mobile upper post -->
                    <ins class="adsbygoogle"
                         style="display:block;"
                         data-ad-client="ca-pub-6288640194310142"
                         data-ad-slot="9020008518"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div class="col-xs-2">
                    <a style="font-size: 25px; color: #d94350;" href="{{url('/')}}">
                        {{ trans('app.logoText') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--NAVIGATION ROW START-->
    <section class="cp-navigation-row" style="height: 3px;margin-bottom: 40px;">
    </section>
    <!--NAVIGATION ROW END-->
</header>