$(function () {

  let menu = document.querySelector('#menu-bars');
  let navbar = document.querySelector('.navbar');

  $('#menu-bars').on('click', function () {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
    searchIcon.classList.remove('fa-times');
    searchForm.classList.remove('active');
  });

  let searchIcon = document.querySelector('#search-icon');
  let searchForm = document.querySelector('.search-form');


  $('#search-icon').click(function () {
    searchIcon.classList.toggle('fa-times');
    searchForm.classList.toggle('active');
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
  });

  window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
    searchIcon.classList.remove('fa-times');
    searchForm.classList.remove('active');
  }

  let sidebar = document.querySelector('.sidebar');
  $('.tooltips .fa-cog').click(function () {
    sidebar.classList.toggle('display');
  });

  $('#posts').click(function(e) {
    sidebar.classList.remove('display');
  });
});


//Image Preview
function previewFile(input){
  var file = $("input[type=file]").get(0).files[0];

  if(file){
      var reader = new FileReader();

      reader.onload = function(){
          $("#previewImg").attr("src", reader.result);
      }

      reader.readAsDataURL(file);
  }
}

$(document).ready(function(){
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    $('.close').click(function(){
        modal.style.display = "none";
    })
})
