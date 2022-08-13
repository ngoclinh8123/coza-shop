const addAddressBtn = document.querySelector(".bill-row-add-new");
const addAddressModal = document.querySelector(".aa-modal");
const addAddressModalReturn = document.querySelector(".aa-content-return");
const addAddressModalConfirm = document.querySelector(".aa-content-confirm");
const addAddressModalFake = document.querySelector(".aa-content-fake");

addAddressBtn.onclick = function () {
  addAddressModal.style.display = "flex";
};

addAddressModalReturn.onclick = function () {
  addAddressModal.style.display = "none";
};

// check validate form add address
const nameInput = document.querySelector(
  ".aa-content-row input[name='aa-name']"
);
const phoneInput = document.querySelector(
  ".aa-content-row input[name='aa-phone']"
);
const addressInput = document.querySelector(
  ".aa-content-row input[name='aa-address']"
);

function checkValidateAddress() {
  let flag = false;
  if (
    nameInput.value != "" &&
    addressInput.value != "" &&
    phoneInput.value != ""
  ) {
    flag = true;
  }
  return flag;
}

function checkSubmit() {
  let result = checkValidateAddress();
  if (result) {
    addAddressModalConfirm.style.display = "inline-block";
    addAddressModalFake.style.display = "none";
  } else {
    addAddressModalConfirm.style.display = "none";
    addAddressModalFake.style.display = "inline-block";
  }
}

nameInput.addEventListener("change", checkSubmit);
phoneInput.addEventListener("change", checkSubmit);
addressInput.addEventListener("change", checkSubmit);
