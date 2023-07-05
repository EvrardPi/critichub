document.addEventListener("DOMContentLoaded", function () {
    // Handler when the DOM is fully loaded
    function mouseAnimation(e) {
      let mouseMovingImg = document.querySelectorAll('.para');
      mouseMovingImg.forEach((img) => {
        let speed = img.getAttribute('speed')
        let x = (window.innerWidth - e.pageX * speed) / 100
        let y = (window.innerHeight - e.pageY * speed) / 100
        img.style.transform = `translate(${x}px,${y}px)`
      })
    }
    document.addEventListener('mousemove', mouseAnimation)
  });
  