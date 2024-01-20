$(window).bind("load", function () {
    var data = GetPostList("empty", 0);
    $(".lineloader-wrapper").hide();
    showRightFeed(data);
    showMoreFeed(data);
});
