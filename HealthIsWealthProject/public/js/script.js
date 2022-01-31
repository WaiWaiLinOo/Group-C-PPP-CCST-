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