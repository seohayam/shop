$(function() {
  $(".smooth").on("click", function() {
    var speed = 500;
    var href = $(this).attr("href");
    // console.log(href);
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top;
    $("html, body").animate({ scrollTop: position }, speed, "swing");
    return false;
  });

  $(".smooth-menue").on("click", function() {
    setTimeout(function() {
      var speed = 500;
      var href = $(this).attr("href");
      var target = $(".tab-content");
      var position = target.offset().top;
      $("html, body").animate({ scrollTop: position }, speed, "swing");
    }, 500);
  });
  $(".smooth-map").on("click", function() {
    setTimeout(function() {
      var speed = 500;
      var href = $(this).attr("href");
      var target = $(".map-target");
      var position = target.offset().top;
      $("html, body").animate({ scrollTop: position }, speed, "swing");
    }, 500);
  });
});
