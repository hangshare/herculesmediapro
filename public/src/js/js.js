/**
 * Created by kaldmax on 3/28/2016.
 */
(function ($, window) {
    "use strict";
    var rootPath = 'http://contentmaster.local';

    $(document).on('click', '#uploadMedia', function () {
        $.ajax({
            url: rootPath + '/media/add',
            type: "GET",
            success: function (data) {
                $('#publicContent').html(data);
                tagsEd();
                $('.multiple').multiselect();
            }
        });
    });


    var proto = $.ui.autocomplete.prototype, initSource = proto._initSource;

    function filter(array, term) {
        var matcher = new RegExp($.ui.autocomplete.escapeRegex(term), "i");
        return $.grep(array, function (value) {
            return matcher.test($("<div>").html(value.label || value.value || value).text());
        });
    }

    $.extend(proto, {
        _initSource: function () {
            if (this.options.html && $.isArray(this.options.source)) {
                this.source = function (request, response) {
                    response(filter(this.options.source, request.term));
                };
            } else {
                initSource.call(this);
            }
        }, _renderItem: function (ul, item) {
            return $("<li></li>").data("item.autocomplete", item).append($("<a></a>")[this.options.html ? "html" : "text"](item.label)).appendTo(ul);
        }
    });
    var cache = {};

    function googleSuggest(request, response) {
        var term = request.term;
        if (term in cache) {
            response(cache[term]);
            return;
        }
        $.ajax({
            url: 'https://query.yahooapis.com/v1/public/yql',
            dataType: 'JSONP',
            data: {
                format: 'json',
                q: 'select * from xml where url="http://google.com/complete/search?output=toolbar&q=' + term + '"'
            },
            success: function (data) {
                var suggestions = [];
                try {
                    var results = data.query.results.toplevel.CompleteSuggestion;
                } catch (e) {
                    var results = [];
                }
                $.each(results, function () {
                    try {
                        var s = this.suggestion.data.toLowerCase();
                        suggestions.push({label: s.replace(term, '<b>' + term + '</b>'), value: s});
                    } catch (e) {
                    }
                });
                cache[term] = suggestions;
                response(suggestions);
            }
        });
    }

    function tagsEd() {
        $('#hero-demo').tagEditor({
            placeholder: 'Enter tags ...',
            initialTags: ['Hello', 'World', 'Example', 'Tags'],
            autocomplete: {source: googleSuggest, minLength: 3, delay: 0, html: true, position: {collision: 'flip'}}
        });
    }


})(jQuery);
