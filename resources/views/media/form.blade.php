<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {!! csrf_field() !!}

    <div class="col-xs-9" style="overflow-y: scroll; height: 510px;">
        <div class="row">
            <img class="preview" src="https://a3.behance.net/img/project_editor/placeholder.png" width="100%"/>
            <button id="upload"><i class="fa fa-cloud-upload"></i>{{ trans('app.upload') }}</button>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="row">
            <div class="modal-header">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-btn fa-user"></i> {{ trans('app.add') }}
                </button>
            </div>
            <div class="scrollbox" style="height: 450px; overflow-y: scroll; overflow-x: hidden;">
                <div class="container">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="control-label">{{ trans('app.tags') }}</label>
                            <textarea id="hero-demo" class="tags form-control" name="tags"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ trans('app.caption') }}</label>
                            <input type="text" class="form-control" name="fname" value="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{ trans('app.category') }}</label>
                            <select name="category" class="multiple" multiple>
                                @foreach($categories as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</form>


