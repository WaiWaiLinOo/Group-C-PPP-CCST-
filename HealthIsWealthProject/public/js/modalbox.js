
$(function () {

  var appendthis = ("<div class='modal-overlay js-modal-close'></div>");

  $('a[data-modal-id]').click(function (e) {
    e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.7);
    var modalBox = $(this).attr('data-modal-id');
    $('#' + modalBox).fadeIn($(this).data());
  });

  $(".js-modal-close, .modal-overlay").click(function () {
    $(".modal-box, .modal-overlay").fadeOut(500, function () {
      $(".modal-overlay").remove();
    });

  });

  $(window).resize(function () {
    $(".modal-box").css({
      top: ($(window).height() - $(".modal-box").outerHeight()) / 2,
      left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
  });

  $(window).resize();

});

//Count For all
$(document).ready(function () {
  
  $.ajax({
    dataType: "json",
    url: "/api/count",
    type: "GET",
    success: function (result) {
      console.log(result);
      $(".category .user-count").append(`<span class='num'>${result['user']}</span>`);
      $(".category .role-count").append(`<span class='num'>${result['role']}</span>`);
      $(".category .post-count").append(`<span class='num'>${result['post']}</span>`);
      $(".category .category-count").append(`<span class='num'>${result['category']}</span>`);
      $(".category .contact-count").append(`<span class='num'>${result['contact']}</span>`);
    }
  });
});

//Add category list
$(document).ready(function () {
  
  $.ajax({
    dataType: "json",
    url: "/api/category",
    type: "GET",
    success: function (result) {
      console.log(result.length);
      let i = 0;
      $.each(result, function () {
        $("#categoryList").append(`<a href="http://127.0.0.1:8000/postByCategory/${result[i].id}"> ${result[i].name} <span class='num'>${result[i].posts_count}</span></a>`);
        i++;
      });
    }
  });
});

//download dropdown
function myDownload() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

//post search 
