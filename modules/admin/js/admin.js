// navigation
const navItemTitles = Array.from(
  document.querySelectorAll(".ad-nav-item-title")
);
const navItems = Array.from(document.querySelectorAll(".ad-nav-item"));
const subnavLists = Array.from(document.querySelectorAll(".ad-subnav-list"));
navItemTitles.forEach(function (navItemTitle, index) {
  navItemTitle.onclick = function () {
    // if (document.querySelector(".ad-nav-item.active")) {
    //   document.querySelector(".ad-nav-item.active").classList.remove("active");
    // }

    if (!navItems[index].classList.contains("active")) {
      navItems[index].classList.add("active");
      subnavLists[index].classList.toggle("open");
      // let len = Array.from(
      //   subnavLists[index].querySelectorAll(".ad-subnav-item")
      // ).length;
      // subnavLists[index].style.height = 34 * len + "px";
    } else if (navItems[index].classList.contains("active")) {
      navItems[index].classList.remove("active");
      // subnavLists[index].style.height = 0;
      subnavLists[index].classList.toggle("open");
    }
  };
});

// order
const actionBtns = document.querySelectorAll(".o-action-btn i");
actionBtns.forEach(function (btn, index) {
  btn.onclick = function () {
    btn.parentElement
      .querySelector(".o-action-list")
      .classList.toggle("action");
  };
});

// select all order
let selectAllBtn = document.querySelector(".o-select-all");
let orderItems = document.querySelectorAll(".o-col-input-item input");
const changeTitleBtn = document.querySelector(".o-change-title");
const changeTitleFakeBtn = document.querySelector(".o-change-title-fake");
function selectAllOrder() {
  orderItems.forEach(function (item, inxex) {
    if (!item.checked) item.click();
  });
}

function clickAllOrder() {
  orderItems.forEach(function (item, inxex) {
    // if (item.checked) item.click();
    item.click();
  });
}

function checkInput() {
  let flag = false;
  orderItems.forEach(function (item, index) {
    if (item.checked) {
      flag = true;
    }
  });
  return flag;
}

function renderNumberOrder() {
  let list = "";
  orderItems.forEach(function (item, index) {
    if (item.checked) {
      list += list + $;
    }
  });
}

// get id of order choosed
const orderChooseInput = document.querySelector(".order-choose-input");
function getIdOrderChoosed() {
  let itemChoose = "";
  orderItems.forEach(function (item, inxex) {
    if (item.checked) {
      itemChoose = itemChoose + "|" + item.value;
    }
  });
  return itemChoose;
}

function insertOrderIntoInput() {
  orderChooseInput.value = getIdOrderChoosed();
}

selectAllBtn.onclick = function () {
  if (selectAllBtn.checked) {
    selectAllOrder();
  } else {
    clickAllOrder();
  }

  if (checkInput()) {
    changeTitleBtn.style.display = "block";
    changeTitleFakeBtn.style.display = "none";
    insertOrderIntoInput();
  } else {
    changeTitleBtn.style.display = "none";
    changeTitleFakeBtn.style.display = "block";
  }
};

orderItems.forEach(function (item, index) {
  item.onclick = function () {
    if (checkInput()) {
      changeTitleBtn.style.display = "block";
      changeTitleFakeBtn.style.display = "none";
      insertOrderIntoInput();
    } else {
      changeTitleBtn.style.display = "none";
      changeTitleFakeBtn.style.display = "block";
    }
  };
});

// change handle
const changeHandleBtn = document.querySelector(".o-handle");
const listHandleBtn = document.querySelector(".o-suv-nav-list-handle");
changeHandleBtn.onclick = function () {
  listHandleBtn.classList.toggle("action");
};

// modal change title
const modalChangTitle = document.querySelector(".modal-change-title");
const exitmodalChangeTitle = document.querySelector(".o-modal-exit i");
changeTitleBtn.onclick = function () {
  modalChangTitle.style.display = "flex";
};

exitmodalChangeTitle.onclick = function () {
  modalChangTitle.style.display = "none";
};
