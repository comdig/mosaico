$(document).ready(function() {
  mouseOver = function() {
    $('.instagram-image').hover(
      function() {
        $(this).animate({ opacity: 1 }, 200);
      },
      function() {
        $(this).animate({ opacity: 0.7 }, 600);
      }
    )
  };
});