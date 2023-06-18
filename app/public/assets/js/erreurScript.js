document.addEventListener("DOMContentLoaded", function () {
    // Handler when the DOM is fully loaded
    function mouseAnimation(e) {
      let mouseMovingImg = document.querySelectorAll('.para');
      console.log(mouseMovingImg);
      mouseMovingImg.forEach((img) => {
        let speed = img.getAttribute('speed')
        let x = (window.innerWidth - e.pageX * speed) / 100
        let y = (window.innerHeight - e.pageY * speed) / 100
        img.style.transform = `translate(${x}px,${y}px)`
      })
  
      let xAxe = (window.innerWidth / 2 - e.pageX * 1) / 50
      let yAxe = (window.innerHeight / 2 - e.pageY * 1) / 25
      titleCard.style.transform = `rotateX(${yAxe}deg) rotateY(${-xAxe}deg)`
  
      
    }
    document.addEventListener('mousemove', mouseAnimation)
  });
  