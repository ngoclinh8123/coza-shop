// slide
var slideImages = Array.from(document.querySelectorAll(".home-slide__item"));
const nextSlideBtn = document.querySelector(".n-btn");
const prevSlideBtn = document.querySelector(".p-btn");
let currentIndexSlide = 1;

function updateSlideNext() {
  document.querySelector(".home-slide__item.active").classList.remove("active");
  slideImages[currentIndexSlide].classList.add("active");
  if (currentIndexSlide >= slideImages.length - 1) {
    currentIndexSlide = 0;
  } else currentIndexSlide++;
}
setInterval(function () {
  updateSlideNext();
}, 7000);

// click to next slide
nextSlideBtn.onclick = function () {
  updateSlideNext();
};

// click to prev slide
prevSlideBtn.onclick = function () {
  document.querySelector(".home-slide__item.active").classList.remove("active");
  slideImages[currentIndexSlide].classList.add("active");
  if (currentIndexSlide == 0) {
    currentIndexSlide = slideImages.length - 1;
  } else currentIndexSlide--;
};

// slick slider
$(document).ready(function () {
  $(".store-ovv-product").slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: false,
  });
});

// const slickPrevBtn = document.querySelector(".slick-prev");
// console.log(slickPrevBtn);

$(".slick__btn-prev").click(function (e) {
  //e.preventDefault();
  $(".store-ovv-product").slick("slickPrev");
});

$(".slick__btn-next").click(function (e) {
  //e.preventDefault();
  $(".store-ovv-product").slick("slickNext");
});

// Store Overview
const storeOvvNav = Array.from(
  document.querySelectorAll(".store-ovv-nav-item")
);
const storeOvvProduct = Array.from(
  document.querySelectorAll(".store-ovv-block-product")
);

storeOvvNav.forEach(function (navItem, index) {
  navItem.onclick = function () {
    // show item
    document
      .querySelector(".store-ovv-block-product.show")
      .classList.remove("show");
    storeOvvProduct[index].classList.add("show");

    // show nav item active
    document
      .querySelector(".store-ovv-nav-item.active")
      .classList.remove("active");
    navItem.classList.add("active");
  };
});
