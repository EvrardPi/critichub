document.addEventListener("DOMContentLoaded", function () {
  let leftArrow = document.querySelector(".navigation span:first-child");
  let rightArrow = document.querySelector(".navigation span:last-child");
  let etape1 = document.querySelector(".form-container h3 span");

  if (etape1 === "Étape 1:") {
    leftArrow.style.display = "none";
  }
});
