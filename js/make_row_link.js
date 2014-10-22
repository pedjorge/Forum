$(document).ready(function() {
    $('#topics tr, #starred_topics tr').click(function() {
        var href = $(this).find("a").attr("href");
            if(href) {
                window.location = href;
            }
    });
});