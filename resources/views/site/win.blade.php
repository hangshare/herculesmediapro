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
        <a id="win" style="margin-top: 20px;" class="btn btn-danger btn-lg" href="#">{{ trans('app.registernow') }}</a>

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

    <hr/>
    <div class="container">
        <div style="margin-top: 20px">
            <h2>{{ $post->title }}</h2>
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



<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '1779795415612954',
            xfbml: true,
            version: 'v2.8'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);

    }(document, 'script', 'facebook-jssdk'));


    (function () {
        // Load the script
        var script = document.createElement("SCRIPT");
        script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js';
        script.type = 'text/javascript';
        document.getElementsByTagName("head")[0].appendChild(script);

        // Poll for jQuery to come into existance
        var checkReady = function (callback) {
            if (window.jQuery) {
                callback(jQuery);
            }
            else {
                window.setTimeout(function () {
                    checkReady(callback);
                }, 100);
            }
        };
        checkReady(function ($) {
            $('#win').on('click', function (e) {
                FB.login(function (response) {
                            if (response.authResponse) {
                                var rec = FB.getAuthResponse();
                                console.log(rec);

                                FB.api(
                                        '/me',
                                        'GET',
                                        {"fields": "id,name,email,about,bio,cover,gender"},
                                        function (response) {
                                            var user = {
                                                'id': response.id,
                                                'email': response.email,
                                                'name': response.name
                                            };
                                            FB.api('/me/picture?type=large', function (response) {
                                                user.pic = response.data.url;
                                            })
                                            console.log(response);
                                        }
                                );

//                                FB.ui(
//                                        {
//                                            method: 'feed',
//                                            name: 'Facebook Dialogs',
//                                            link: 'https://developers.facebook.com/docs/reference/dialogs/',
//                                            picture: 'http://fbrell.com/f8.jpg',
//                                            caption: 'Reference Documentation',
//                                            description: 'Dialogs provide a simple, consistent interface for applications to interface with users.',
//                                            message: 'Facebook Dialogs are easy!'
//                                        },
//                                        function(response) {
//                                            if (response && response.post_id) {
//                                                alert('Post was published.');
//                                            } else {
//                                                alert('Post was not published.');
//                                            }
//                                        }
//                                );

                                FB.api('/me/feed', 'post', {
                                    message: 'my_message',
                                    link: 'www.tasmeemme.com',
                                    picture: 'https://d272hsr4c75psf.cloudfront.net/resize_805x9000/762/306762.jpg',
                                    name: 'Post name',
                                    description: 'description'
                                }, function (data) {
                                    console.log(data);
                                });

                            }
                        },
                        //{scope: 'email,public_profile,user_friends,user_photos,publish_actions,manage_pages,publish_pages,user_birthday,user_location,user_website'}
                        {scope: 'email,public_profile,user_friends'}
                        //user_birthday, user_religion_politics, user_relationships,
                        // user_relationship_details, user_hometown, user_location, user_likes, user_education_history, user_work_history,
                        // user_website, user_events, user_photos, user_videos, user_friends, user_about_me, user_status, user_posts, offline_access,
                        // whitelisted_offline_access, public_profile
                );
            });
        });
    })();
</script>
