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