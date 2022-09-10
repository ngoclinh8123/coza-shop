const homeHeading = document.querySelector(".heading");
const headingTop = document.querySelector("#home-top");
if (headingTop) {
  homeHeading.style.top = "40px";
} else homeHeading.style.top = 0;

document.onscroll = function () {
  let currentHeight;
  let scrollTop = window.scrollY || document.documentElement.scrollTop;
  if (scrollTop < 40) {
    if (headingTop) {
      currentHeight = 40 - scrollTop;
    } else currentHeight = 0;
    homeHeading.style.backgroundColor = "transparent";
    homeHeading.style.height = "84px";
    homeHeading.style.boxShadow = "unset";
  } else {
    currentHeight = 0;
    homeHeading.style.backgroundColor = "white";
    homeHeading.style.height = "70px";
    homeHeading.style.boxShadow = "1px 1px 4px rgba(0,0,0,.3)";
  }
  homeHeading.style.top = currentHeight + "px";
};

// modal search
const searchBtn = document.querySelector(".heading-search i");
const searchModal = document.querySelector(".search-modal");
const exitSearchBtn = document.querySelector(".exit-btn");
searchBtn.onclick = function () {
  searchModal.style.display = "flex";
  document.querySelector(".search-input").focus();
};

exitSearchBtn.onclick = function () {
  searchModal.style.display = "none";
};

// cart
const openCartBtn = document.querySelector(".heading-cart");
const homeCartBlock = document.querySelector(".home-cart");
const exitCartBtn = document.querySelector(".home-cart-exit");
const homeCartContent = document.querySelector(".home-cart-block");
const cartModal = document.querySelector(".home-cart-modal");
openCartBtn.onclick = function () {
  homeCartBlock.style.display = "block";
};

exitCartBtn.onclick = function () {
  homeCartBlock.style.display = "none";
};

cartModal.onclick = function (e) {
  homeCartBlock.style.display = "none";
};

// cart amount item
const cartItems = Array.from(document.querySelectorAll(".home-cart-item"));
const cartItemAmount = document.querySelector(".heading-ac-status");
cartItemAmount.innerText = cartItems.length;
console.log(cartItems);

const detailCartBtn = document.querySelector(".home-cart-view");
const totalPriceBlock = document.querySelector(".home-cart-total");
const cartEmptyText = document.querySelector(".home-cart-empty");

if (cartItems.length > 0) {
  detailCartBtn.style.display = "block";
  totalPriceBlock.style.display = "block";
  cartEmptyText.style.display = "none";
} else {
  detailCartBtn.style.display = "none";
  totalPriceBlock.style.display = "none";
  cartEmptyText.style.display = "block";
}

// home acccount
const homeAcountImg = document.querySelector(".heading-ac-avatar img");
const homeAcountBlock = document.querySelector(".home-account");
const homeAcountExitBtn = document.querySelector(".home-account-exit");
const homeGuessIcon = document.querySelector(".heading-account-guess i");
const accountModal = document.querySelector(".home-account-modal");

if (homeAcountImg) {
  homeAcountImg.onclick = function () {
    homeAcountBlock.style.display = "block";
  };
}

if (homeGuessIcon) {
  homeGuessIcon.onclick = function () {
    homeAcountBlock.style.display = "block";
  };
}

homeAcountExitBtn.onclick = function () {
  homeAcountBlock.style.display = "none";
};

accountModal.onclick = function () {
  homeAcountBlock.style.display = "none";
};

// handle total price in cart
const totalPriceCartTag = document.querySelector(".home-cart-total-price");
const amountTags = Array.from(
  document.querySelectorAll(".home-cart-item--amount")
);
const priceTags = Array.from(
  document.querySelectorAll(".home-cart-item--price")
);
function renderTotalPrice() {
  let totalPrice = 0;
  amountTags.forEach(function (amount, index) {
    let amountItem = parseInt(amount.innerText);
    let price = parseInt(priceTags[index].innerText);
    totalPrice += amountItem * price;
    totalPriceCartTag.innerText = totalPrice;
  });
}
renderTotalPrice();
