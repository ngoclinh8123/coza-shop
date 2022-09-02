// image active
const itemImages = Array.from(document.querySelectorAll(".prd-col--1 img"));
const itemIsChoose = Array.from(
  document.querySelectorAll(".prd-col--2-border img")
);
itemImages.forEach(function (itemImage, index) {
  itemImage.onclick = function () {
    document.querySelector(".prd-col--1 img.active").classList.remove("active");
    document
      .querySelector(".prd-col--2-border img.active")
      .classList.remove("active");
    itemImage.classList.add("active");
    itemIsChoose[index].classList.add("active");
  };
});

// infomation
const infoNavs = Array.from(document.querySelectorAll(".prd-detail-nav span"));
const infoItem = Array.from(
  document.querySelectorAll(".prd-detail-item-infomation")
);
infoNavs.forEach(function (infoNav, index) {
  infoNav.onclick = function () {
    document
      .querySelector(".prd-detail-nav span.active")
      .classList.remove("active");
    document
      .querySelector(".prd-detail-item-infomation.active")
      .classList.remove("active");
    infoNav.classList.add("active");
    infoItem[index].classList.add("active");
  };
});

// active amount product
const incBtn = document.querySelector(".prd-inc-btn");
const desBtn = document.querySelector(".prd-des-btn");
const amountBtn = document.querySelector(".prd-amount");
const amountInput = document.querySelector("#amount-item");
let currentAmount = amountInput.value;
if (currentAmount == 1) {
  desBtn.classList.add("off");
}
incBtn.onclick = function () {
  currentAmount++;
  amountInput.value = currentAmount;
  amountBtn.innerText = currentAmount;
  if (desBtn.classList.contains("off")) desBtn.classList.remove("off");
};
desBtn.onclick = function () {
  if (currentAmount > 1) {
    currentAmount--;
    amountInput.value = currentAmount;
    amountBtn.innerText = currentAmount;
  }
  if (currentAmount == 1) desBtn.classList.add("off");
};

// error if no chooses
const errorSizeLine = document.querySelector(".prd-form-error.size");
const errorColorLine = document.querySelector(".prd-form-error.color");
const sizeRow = document.querySelector(".prd-form-row.size");
const colorRow = document.querySelector(".prd-form-row.color");
if (errorSizeLine) {
  sizeRow.classList.add("error");
}
if (errorColorLine) {
  colorRow.classList.add("error");
}

// modal success
const modalSuccessLayer = document.querySelector(".register-success-form");
const exitModal = document.querySelector(".register-success-content i");
const modalContent = document.querySelector(".register-success-content");

if (exitModal) {
  exitModal.onclick = function () {
    modalSuccessLayer.style.display = "none";
  };
}

// buy now handle url
const sizeTag = document.querySelector(".prd-form-row.size select");
const colorTag = document.querySelector(".prd-form-row.color select");
const buyNowBtn = document.querySelector(".prd-buy-now");
const amountTag = document.querySelector(".prd-form-row-btn.prd-amount");
const buynowFake = document.querySelector(".prd-buy-now-fake");
const idTag = document.querySelector(".prd-id");
// console.log(amountTag);
// console.log(buyNowBtn);
// console.log(sizeTag);
// console.log(colorTag);

function checkInputSelect() {
  if (sizeTag.value != "" && colorTag.value != "") {
    let size = sizeTag.value;
    let color = colorTag.value;
    let amount = amountTag.innerText;
    let id = idTag.value;
    let path = "hoa-don?item=" + id + "-" + amount + "-" + size + "-" + color;
    buyNowBtn.setAttribute("href", path);
    buynowFake.style.display = "none";
    buyNowBtn.style.display = "block";
  }
}

sizeTag.oninput = function () {
  checkInputSelect();
};

colorTag.oninput = function () {
  checkInputSelect();
};
