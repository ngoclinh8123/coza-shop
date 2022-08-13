// chon tat ca san pham
var selectAll = function (selecAllBtn) {
  if (selecAllBtn.checked) {
    items.forEach(function (item, index) {
      if (!item.checked) {
        item.click();
      }
    });
  } else {
    items.forEach(function (item, index) {
      item.click();
    });
  }
};

// dem so san pham duoc chon
function countInputSelect() {
  let num = 0;
  items.forEach(function (item, index) {
    if (item.checked) {
      num++;
    }
  });
  return num;
}

// tinh tong tien san pham duoc chon
function countTotalPrice() {
  let total = 0;
  items.forEach(function (item, index) {
    if (item.checked) {
      let parentTag = item.parentElement.parentElement;
      let currentPrice = parentTag.querySelector(
        ".cart-col--4 .cart-item-price"
      ).innerText;
      currentPrice = parseInt(currentPrice);
      let currentNum = parentTag.querySelector(
        ".cart-item-amount span"
      ).innerText;
      currentNum = parseInt(currentNum);
      total += currentPrice * currentNum;
    }
  });
  return total;
}
// cart detail

// const rowItem = Array.from(document.querySelectorAll(".cart-row"));
// rowItem.forEach(function (item, index) {
//   console.log(item);
// });
const cartDecButton = Array.from(document.querySelectorAll(".cart-item-dec"));
cartDecButton.forEach(function (cartItem, index) {
  cartItem.onclick = function (e) {
    // console.log(e.path[2]);
    let cartItemAmount = e.path[2].querySelector(".cart-item-amount span");
    let cartItemAmountInput = e.path[2].querySelector(".cart-item-amount span");
    let amountItem = cartItemAmountInput.innerText;
    amountItem = parseInt(amountItem);
    if (amountItem > 1) amountItem--;
    cartItemAmount.innerText = amountItem;
    totalPrice = countTotalPrice();
    totalPriceTag.innerText = totalPrice;

    let cartCheckboxInput =
      e.path[2].parentElement.querySelector(".cart-col--1 input").value;
    cartCheckboxInputArray = cartCheckboxInput.split("-");
    let id = cartCheckboxInputArray[0];
    let size = cartCheckboxInputArray[2];
    let color = cartCheckboxInputArray[3];
    let newValue = id + "-" + amountItem + "-" + size + "-" + color;
    e.path[2].parentElement.querySelector(".cart-col--1 input").value =
      newValue;
  };
});

const cartIncButton = Array.from(document.querySelectorAll(".cart-item-inc"));
cartIncButton.forEach(function (cartItem, index) {
  cartItem.onclick = function (e) {
    let cartItemAmount = e.path[2].querySelector(".cart-item-amount span");
    let cartItemAmountInput = e.path[2].querySelector(".cart-item-amount span");
    let amountItem = cartItemAmountInput.innerText;
    amountItem = parseInt(amountItem);
    amountItem++;
    cartItemAmount.innerText = amountItem;
    totalPrice = countTotalPrice();
    totalPriceTag.innerText = totalPrice;

    let cartCheckboxInput =
      e.path[2].parentElement.querySelector(".cart-col--1 input").value;
    cartCheckboxInputArray = cartCheckboxInput.split("-");
    let id = cartCheckboxInputArray[0];
    let size = cartCheckboxInputArray[2];
    let color = cartCheckboxInputArray[3];
    let newValue = id + "-" + amountItem + "-" + size + "-" + color;
    e.path[2].parentElement.querySelector(".cart-col--1 input").value =
      newValue;
  };
});

// all item in cart
const items = Array.from(
  document.querySelectorAll(".cart-row input[name='item-buy[]']")
);

const selectAllTop = document.querySelector(
  ".cart-row-head .cart-col--1 input"
);
const selectAllFoot = document.querySelector(".cart-select-all input");

const totalItemTag = document.querySelector(".total-item-tag");
const totalItemTag2 = document.querySelector(".total-item-select");
const totalPriceTag = document.querySelector(".cart-total-price");
const descAllBtn = Array.from(document.querySelectorAll(".cart-item-dec"));
const incAllBtn = Array.from(document.querySelectorAll(".cart-item-inc"));
totalItemTag.innerText = items.length;

let itemSelected = 0;
let totalPrice = 0;
items.forEach(function (item, index) {
  item.onclick = function () {
    itemSelected = countInputSelect();
    totalItemTag2.innerText = itemSelected;

    totalPrice = countTotalPrice();
    totalPriceTag.innerText = totalPrice;

    preventDefaultSubmit();
  };
});

selectAllTop.onclick = function () {
  selectAll(this);
};

selectAllFoot.onclick = function () {
  selectAll(this);
};

function preventDefaultSubmit() {
  let flag = true;
  items.forEach(function (item, index) {
    if (item.checked) flag = false;
  });
  if (flag) {
    document.querySelector(".fakeButton").style.display = "block";
    document.querySelector(".cart-buy-button input").style.display = "none";
  } else {
    document.querySelector(".fakeButton").style.display = "none";
    document.querySelector(".cart-buy-button input").style.display = "block";
  }
}

preventDefaultSubmit();
