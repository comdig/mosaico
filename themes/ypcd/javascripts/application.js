recentImages = function(hash, access_token) {
  $.getJSON("https://api.instagram.com/v1/tags/"+ hash + "/media/recent?access_token="+ access_token +"&callback=?", 
    {},
    function (data) {
      $.each(data.data, function(i, data) {
        $('#recent-id p span').html(data.caption.from.full_name);
        if (i == 0) return false;
      });  
    }
  );
};

totalImages = function(hash, access_token) {
  $.getJSON("https://api.instagram.com/v1/tags/"+ hash + "?access_token="+ access_token +"&callback=?", 
    {},
    function (data) {
      $('#score p span').html(data.data.media_count);
    }
  );
};

loadMosaic = function(next_url, hash, access_token) {
  var count = 0;

  $.ajax({
    method: "GET",
    url: next_url,
    dataType: "jsonp",
    jsonp: "callback",
    jsonpCallback: "jsonpcallback",

    success: function(data) {
      $.each(data.data, function(i, item) {
        $('.instagram').append(
          '<div class="instagram-placeholder"><a href="'+ item.link +'" target="_blank"><img class="instagram-image" src="'+ item.images.thumbnail.url +'" /></a></div>'
        );
        ++count;
      });

      if (data.pagination.next_url && count <=160) {
        loadMosaic(data.pagination.next_url);
      } else {
        $('.hide').fadeOut(1000);
        //mouseOver();
      }
    }
  });
};