var images = []; // global variable to put images in
/*
 * When img is clicked (from selection pane)
 * we grab those images and put them in images
 * At that time we also remove the html in the slides pane & the header
 */
$(".slide-pane img").on("click", function(event){ 
  event.preventDefault();
  var slidedeck = this.name;
  $.ajax({
    type:"POST", 
    url:"imageloader.php",
    data:{deck:slidedeck},
    success:function(rawData){
      data = jQuery.parseJSON(jQuery.parseJSON(rawData));
      $(".slides-window").html(""); // get rid if the stuff on the mage
      $(".preview-window").attr("class", "slides-window"); // change the css of that box
      $(".page-header").remove(); // get rid of our header
      images = data.images; // get data into our global variable
      console.log(images);
      $(".slides-window").append("<img id='slide' src='"+images[0]+"'>"); // append first image to page
      setInterval(loop, 1000); // start transitions
    }
  });
});
/*
 * swaps 2 images, replacing the first with the second, 
 * swapImages(HTMLDOM, STRING);
 *
 */
function swapImages(I1, I2location){
  I1.fadeOut(function() {
    I1.load(function() { I1.fadeIn(); });
     I1.attr("src", I2location);
  });
}
// returns next slide location from array given slide id
function next(i,images){
  return images[i];
}
// if at end of array, loop, else continue
var i=1;
function loop(){
  if(i == images.length){
    i=0;
    loop(images);
    console.log("restarting"); // note in the console when we start presentation over again
  }else{
    swapImages($("#slide"), next(i, images));
    i++; // increment our counter
  }
}
