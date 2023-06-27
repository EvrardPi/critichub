export function topSlider() {
  let leftArrow = document.getElementById("left-slider-top-arrow");
  let rightArrow = document.getElementById("right-slider-top-arrow");
  let currentSlide = 0;
  let slideNumber = document.querySelectorAll(".slide-a");
  console.log(slideNumber);

  leftArrow.addEventListener("click", function () {
    slideNumber[currentSlide].classList.remove("active");
    if (currentSlide == 0) {
      currentSlide = slideNumber.length - 1;
    } else {
      currentSlide -= 1;
    }
    slideNumber[currentSlide].click();
    slideNumber[currentSlide].classList.add("active");
  });

  for (let i = 0; i < slideNumber.length; i++) {
    slideNumber[i].addEventListener("click", function (event) {
      //gestion de l'active class
      let currentActive = document.querySelector("a.active");
      if (currentActive) {
        currentActive.classList.remove("active");
      }
      this.classList.add("active");
    });
  }

  rightArrow.addEventListener("click", function () {
    slideNumber[currentSlide].classList.remove("active");
    if (currentSlide == slideNumber.length - 1) {
      currentSlide = 0;
    } else {
      currentSlide += 1;
    }
    slideNumber[currentSlide].click();
    slideNumber[currentSlide].classList.add("active");
  });
}
