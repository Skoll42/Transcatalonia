(function($) {
    var nextSelector = '.navigation .next';
    var loadMoreBlockSelector = '.load-more';
    var loadMoreSelector = nextSelector;
    var contentSelector = '.posts-list';
    var desturl;

    $(document).ready(function() {
        var next = $(nextSelector);
        if (next.length) {
            desturl = $(nextSelector).attr('href');
        } else {
            $(loadMoreSelector).hide();
        }


        $(loadMoreSelector).click(function(e) {
            e.preventDefault();
            loadNextPage();
        });
    });

    function loadNextPage() {
        $(loadMoreBlockSelector).addClass('loading');

        $.ajax({
            // params
            url: desturl,
            dataType: 'html',
            success: function (data) {
                var obj = $(data),
                    newContent = obj.find(contentSelector).html(),
                    next = obj.find(nextSelector);

                if (next.length) {
                    desturl = next.attr('href');
                }
                else {
                    $(loadMoreSelector).hide();
                }

                $(loadMoreBlockSelector).removeClass('loading');

                $(contentSelector).append(newContent);
            },
            error: function() {
                $(loadMoreBlockSelector).removeClass('loading');
                $(loadMoreSelector).hide();
            }
        });
    }
})(jQuery);