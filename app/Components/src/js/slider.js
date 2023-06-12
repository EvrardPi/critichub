export function slider() {
  let slide = document.querySelector(".sliderContainer");
  let arrowLeft = document.querySelector("#leftArrow");
  let arrowRight = document.querySelector("#rightArrow");
  let doubleClickPrevent = 0;

  const scrollingRight = () => {
    if (doubleClickPrevent == 0) {
      slide.scrollBy({
        left: -700,
        behavior: "smooth",
      });
      doubleClickPrevent = 1;
      setTimeout(() => {
        doubleClickPrevent = 0;
      }, 1000);
    }
  };

  const scrollingLeft = () => {
    if (doubleClickPrevent == 0) {
      slide.scrollBy({
        left: 700,
        behavior: "smooth",
      });
      doubleClickPrevent = 1;
      setTimeout(() => {
        doubleClickPrevent = 0;
      }, 1000);
    }
  };

  arrowLeft.addEventListener("click", scrollingRight);
  arrowRight.addEventListener("click", scrollingLeft);
}
