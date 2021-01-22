
$((function() {
  $(".select li").on("click", (function() {
    $("html, body").animate({
        scrollTop: $(".links").offset().top - 45
    }, 800),
    $(".type").removeClass("article-overwrite video-overwrite book-overwrite movie-overwrite podcast-overwrite other-overwrite"),
    $(".links ul li").removeClass("hidden"),
    $(".select li a").removeClass("active"),
    $(".select").addClass("active"),
    $(this).find("a").toggleClass("active");
    var e = $(this).attr("class");
    $(".links ul li:not(." + e + ")").addClass("hidden"),
    $(".type").addClass(e + "-overwrite")
  })),
  $(".select li.all").on("mouseover", (function() {
      $(".links ul li, .links .seperator").removeClass("hide")
  })),
  $(".select li.all").on("click", (function() {
      $(".links ul li").removeClass("hidden")
  }))
}));