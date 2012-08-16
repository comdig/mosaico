$(document).ready(function() {
  mouseOver = function() {
    $('.instagram-image').hover(
      function() {
        $(this).stop().animate({ opacity: 1 }, 200);
      },
      function() {
        $(this).stop().animate({ opacity: 0.6 }, 200);
      }
    )
  };
});