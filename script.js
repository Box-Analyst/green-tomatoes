window.onload = function load() {
  showSlides();

  setInterval(() => {
    showSlides();
  }, 2500);

}

function showSlides() {
  var randomNumber = Math.floor(Math.random() * 5) + 1;
  document.getElementById("slides").src = `./media/landing/${randomNumber}.jpg`;
}

function mobiMenuOpen() {
  document.getElementById("mobiMenu").style.display = "flex";
  document.getElementById("mobiMenu").style.float = "left";
  document.getElementById("mobiMenu").style.position = "absolute";
  document.getElementById("mobiMenu").style.zIndex = "99 !important";
  document.getElementById("mobiMenu").style.animationName = "mobiMenuOpen";
}

function mobiMenuClose() {
  document.getElementById("mobiMenu").style.animationName = "mobiMenuClose";
  setTimeout(() => {
    document.getElementById("mobiMenu").style.display = "none";
  }, 990);
}

