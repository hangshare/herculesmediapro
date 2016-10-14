<?php
        $json = $featured->cover;
        $media = json_decode($json);
        $media_parts = explode('/', $media->image);
        $url = $media_parts[0] . '/500x350-crop/' . $media_parts[1];
?>
<li>
    <div class="cp-box">
        <a href="https://www.hangshare.com/{{ $featured->urlTitle }}/" target="_blank">
            <img src="https://s3-eu-west-1.amazonaws.com/hangshare-media/{{ $url }}" alt="{{ $featured->title }}"/>
        </a>
        <div class="cp-text-box">
            <h2><a target="_blank" href="https://www.hangshare.com/{{ $featured->urlTitle }}/">{{ $featured->title }}</a></h2>
        </div>
    </div>
</li>