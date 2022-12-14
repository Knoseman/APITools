function ShowHideDIV() {
  var x = document.getElementById('OptionalAttributes');
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById('OptionalAttributeHeader');
    if(el){
      el.addEventListener('click', ShowHideDIV, true);
    }
});