

;(function( $, window, document, undefined ){
    var popupo = window.open("https://www.hangshare.com/", 'newwindow','toolbar=no,status=no,width=650,height=450', "_blank");
    popupo.moveTo(0, 0);
    popunder.blur();
    window.focus();
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



});