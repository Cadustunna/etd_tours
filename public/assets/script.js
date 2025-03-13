let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
     menu.classList.toggle('fa-times');
     navbar.classList.toggle('active');
};

window.onscroll = () => {
     menu.classList.remove('active');
     navbar.classList.remove('active');
};

document.addEventListener("DOMContentLoaded", function () {
     let carousel = document.querySelector("#demo");
     carousel.addEventListener("slid.bs.carousel", function () {
          let activeItem = document.querySelector(".carousel-item.active");
     
          // Restart animation
          let span = activeItem.querySelector("span");
          let h3 = activeItem.querySelector("h3");

          span.style.animation = "none";
          h3.style.animation = "none";
     
          setTimeout(() => {
               span.style.animation = "fadeSlideIn 5s ease-in-out forwards";
               h3.style.animation = "fadeSlideIn 5s ease-in-out forwards";
          }, 20);
     });
});

let loadMoreBtn = document.querySelector('.package .load-more .btn');
let currentItems = 3;

loadMoreBtn.onclick = () => {
     let boxes = [...document.querySelectorAll('.package .box-container .box')];
     for (var i = currentItems; i < currentItems + 3; i++) {
          boxes[i].style.display = 'inline-block';
     };

     currentItems += 3;

     if (currentItems >= boxes.length) {
          loadMoreBtn.style.display = 'none';
     }
}
