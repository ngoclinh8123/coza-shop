// pagination
let pagBtns = Array.from(document.querySelectorAll(".lap-pag-item a"));
let pagDots = Array.from(document.querySelectorAll(".lap-pag-dot"));
const prevBtn = document.querySelector(".lap-pag-prev");
const nextBtn = document.querySelector(".lap-pag-next");
function renderPagination(pagBtns, start, end) {
  pagBtns.forEach(function (pagBtn, index) {
    if (index >= startPoint && index < endPoint) {
      pagBtn.style.display = "flex";
    } else pagBtn.style.display = "none";
  });
}
let startPoint = 0;
let endPoint = startPoint + 4;
if (pagBtns.length > 0) {
  pagBtns[0].style.display = "flex";
}
if (pagBtns.length < 5) {
  nextBtn.classList.add("off");
}
prevBtn.classList.add("off");
if (pagBtns.length > 4) pagDots[1].style.display = "flex";
renderPagination(pagBtns, startPoint, endPoint);
if (pagBtns.length > 4) {
  prevBtn.onclick = function () {
    if (startPoint > 0) {
      startPoint--;
      endPoint--;
      renderPagination(pagBtns, startPoint, endPoint);
    }
    if (startPoint == 0) {
      pagDots[0].style.display = "none";
      prevBtn.classList.add("off");
    }
    if (endPoint < pagBtns.length) {
      pagDots[1].style.display = "flex";
      nextBtn.classList.remove("off");
    }
  };

  nextBtn.onclick = function () {
    if (endPoint < pagBtns.length) {
      startPoint++;
      endPoint++;
      renderPagination(pagBtns, startPoint, endPoint);
      prevBtn.classList.remove("off");
    }
    // hien dau ... sau page 1
    if (startPoint > 0) pagDots[0].style.display = "flex";
    if (endPoint == pagBtns.length) {
      pagDots[1].style.display = "none";
      nextBtn.classList.add("off");
    }
  };
}
