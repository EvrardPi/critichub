window.addEventListener("DOMContentLoaded", function () {
  document.body.style.opacity = 1; //fade in effect
  gestionBackroundVideo();
});

function gestionBackroundVideo() {
  //gestion of video player
  const video = document.getElementById("backround-video");
  const playButton = document.getElementById("backround-video-control");
  let playing = true;

  playButton.addEventListener("click", function () {
    if (playing) {
      video.pause();
      playing = false;
      playButton.innerHTML = "play_arrow";
    } else {
      video.play();
      playing = true;
      playButton.innerHTML = "pause";
    }
  });
}
