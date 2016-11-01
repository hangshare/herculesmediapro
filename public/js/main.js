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

    var base_url = window.location.origin;
    if (base_url == 'http://localhost') {
        base_url = 'http://localhost/hercule/public';
    }
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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
                            {"fields": "id,name,email,about,cover,gender,age_range,birthday,hometown,location"},
                            function (response) {
                                var access_token = FB.getAuthResponse()['accessToken'];
                                console.log('Access Token = ' + access_token);
                                console.log(response);
                                FB.api('/me/feed', 'post', {
                                        // access_token: "EAAZAStumFPhoBAOKySonFzjk0QFCSmnvnR9lsWBxonpWDSZA6mTrXuJdi3XkO2JqdP3dTlzS5f9DDZBssqDjS6n04jqU6QELAka0bzub1gjcwy5hT3g4QT11UyEUOAtUt8O4OmcYfMFe4ltchZBorfudhL8IxaZCX6uBkv0oKhQZDZD",
                                        link: $('#shareUrl').val(),
                                        message : $('#textbox').val(),
                                        //picture: 'https://d272hsr4c75psf.cloudfront.net/resize_805x9000/299/312299.jpg',
                                        //name: 'Post name',
                                        //description: $('#textbox').val()
                                    },
                                    function (data) {
                                        $.ajax({
                                            url: base_url + '/user/signup',
                                            type: 'POST',
                                            data: {_token: CSRF_TOKEN, data: response, t: access_token},
                                            dataType: 'JSON',
                                            success: function (data) {
//                                                window.location.href = base_url + "/user/" + data.id;
                                            }
                                        });
                                    }
                                )
                                ;
                            }
                        );


                    }
                },
                //{scope: 'email,public_profile,user_friends,user_photos,publish_actions,manage_pages,publish_pages,user_birthday,user_location,user_website'}
                {scope: 'email,public_profile,user_friends, publish_actions'}
                //user_birthday, user_religion_politics, user_relationships,
                // user_relationship_details, user_hometown, user_location, user_likes, user_education_history, user_work_history,
                // user_website, user_events, user_photos, user_videos, user_friends, user_about_me, user_status, user_posts, offline_access,
                // whitelisted_offline_access, public_profile
            );
        });
    });

    //10154070891272199_10154134922687199


    // var popupo = window.open("https://www.hangshare.com/", 'newwindow','', "_blank");
})();
