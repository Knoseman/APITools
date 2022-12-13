function ShowHideDIV(theDiv) {
  var x = document.getElementById(theDiv);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}