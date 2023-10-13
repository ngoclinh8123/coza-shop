// open choose address
const addressDefaut = document.querySelector(".bill-address-default");
const chooseAddressBlock = document.querySelector(".bill-aa-container");
const chooseAddressBlockConfirm = document.querySelector(".aa-change-confirm");
const chooseAddressBlockReturn = document.querySelector(".aa-change-return");
const changeAddressDefaultBtn = document.querySelector(".bill-edit-address");
const addressRadioInput = Array.from(
  document.querySelectorAll(".aa-row input")
);
const nameTag = document.querySelector(".bill-user-default");
const phoneTag = document.querySelector(".bill-phone-default");
const addressTag = document.querySelector(".bill-address-extra");
const inputIdAddressTag = document.querySelector(".bill-user-input");

if (addressDefaut) {
  if (changeAddressDefaultBtn) {
    changeAddressDefaultBtn.onclick = function () {
      chooseAddressBlock.style.display = "block";
      addressDefaut.style.display = "none";
    };

    chooseAddressBlockReturn.onclick = function () {
      chooseAddressBlock.style.display = "none";
      addressDefaut.style.display = "flex";
    };
  }
}

function checkInputChecked() {
  addressRadioInput.forEach(function (item, index) {
    if (item.checked) {
      //   console.log(item.parentElement);
      let name = item.parentElement.querySelector(".bill-user").innerText;
      let phone = item.parentElement.querySelector(".bill-phone").innerText;
      let address = item.parentElement.querySelector(".bill-address").innerText;
      let id = item.parentElement.querySelector(".bill-address-id").innerText;

      nameTag.innerText = name;
      phoneTag.innerText = phone;
      addressTag.innerText = address;
      inputIdAddressTag.value = id;
    }
  });
}

chooseAddressBlockConfirm.onclick = function () {
  checkInputChecked();
  chooseAddressBlock.style.display = "none";
  addressDefaut.style.display = "flex";
};

// total price
const billTotalPrice = document.querySelector(".bill-total-price");
const billTotal = document.querySelector(".bill-total");
const ship = parseInt(document.querySelector(".ship").innerText);
const items = document.querySelectorAll(".bill-row-product");
const billTotalInput = document.querySelector(".bill-total-input");
function renderTotalPrice() {
  let totalPrice = 0;
  items.forEach(function (item, index) {
    let amount = parseInt(
      item.querySelector(".bill-product-amount-tag").innerText
    );
    let price = parseInt(
      item.querySelector(".bill-product-price-tag").innerText
    );
    totalPrice += amount * price;
  });
  let totalPrice2 = totalPrice + ship;
  billTotalPrice.innerText = totalPrice;
  billTotal.innerText = totalPrice2;
  billTotalInput.value = totalPrice2;
}

renderTotalPrice();

// khi co dia chi thi moi cho dat hang
const buyBtnReal = document.querySelector(".buy-button");
const buyBtnFake = document.querySelector(".bill-confirm-btn--fake");
const noAddressBlock = document.querySelector(".bill-no-address-default");

if (noAddressBlock) {
  buyBtnReal.style.display = "none";
  buyBtnFake.style.display = "inline-block";
} else {
  buyBtnReal.style.display = "inline-block";
  buyBtnFake.style.display = "none";
}
