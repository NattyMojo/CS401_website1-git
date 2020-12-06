$(function(event) {
  //Change Modal Image with Clicked Image
  $(".pic").click(function () {
    $("#myModal").css("display", "block");
    var newSrc = $(this).attr("src").replace('_t', '');
    $("#modalImg").attr("src", newSrc);
  });
  
  //Close the window
  $(".close").click(function () {
    $("#myModal").css("display", "none");
  });
});
