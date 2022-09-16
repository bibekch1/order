let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick= () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');


}





const currentLocation = location.origin + location.pathname;
const menuItem = document.querySelectorAll('a');
const menuLength = menuItem.length
for (let i=0; i<menuLength;i++){
  if(menuItem[i].href === currentLocation){
    menuItem[i].className = "active"
  }
}






// js for homeswiper
var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop:true,
  });
//    swiper end

//js for review slider
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },
    loop:true,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
        },
        766: {
            slidesPerView: 2,
        },
        1020: {
            slidesPerView: 3,
        },
    }
  });
  //slider end


//js for loader
var loader  = document.getElementById("loader");

window.addEventListener("load", function(){

  loader.style.visibility = "hidden";

});




//js for about read more
var content =document.getElementById("content");
var button = document.getElementById("learn-more");

button.onclick= function()
{
  if(content.className == "open")
  {
    //shrink the box
    content.className = "";
    button.innerHTML = "learn more";
    
  }
  else
  {
    //expand the box
    content.className = "open";
    button.innerHTML = "show less";
  }
};