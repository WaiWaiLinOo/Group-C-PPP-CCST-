
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
//Add category list
$(document).ready(function () {
  
  $.ajax({
    dataType: "json",
    url: "/api/category",
    type: "GET",
    success: function (result) {
      console.log(result);
      $.each(result, function (index, value) {
        $("#categoryList").append(`<a href="http://127.0.0.1:8000/postByCategory/${index}"> ${value}</a>`);
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
