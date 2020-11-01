// Get the modal
var modal = document.getElementById("myModal");

// Get the Image
var img = $(".pic");

//Get the Modal Image
var modalImg = document.getElementById("modalImg");

//Change Modal Image with Clicked Image
$(".pic").click(function () {
  modal.style.display = "block";
  var newSrc = this.src;
  modalImg.src = newSrc;
});

//Close the window
var span = document.getElementsByClassName("close")[0];
span.onclick = function () {
  modal.style.display = "none";
};

