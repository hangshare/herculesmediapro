<article class="col-md-4 col-sm-6 article">
    <div class="inner-article">
        <div class="article-img">
            <div class="waves-effect waves-light">
                <a href="{{ url('/win',['id'=>$phones->id]) }}">
                    <img class="img-responsive waves-image"
                         src="{{ $phones->image }}">
                </a>
            </div>
        </div>
        <div class="article-padding">
            <span class="article-date"></span>
            <a href="{{ url('/win',['title'=> sluggable($phones->name),'id'=>$phones->id]) }}"><h3>{{ $phones->name }}</h3></a>

            <div class="btn float-buttons waves-effect waves-button waves-float waves-light">
                <a href="{{ url('/win',['title'=> sluggable($phones->name),'id'=>$phones->id]) }}">{{ trans('app.addyourself') }}</a>
            </div>
        </div>
    </div>
</article>