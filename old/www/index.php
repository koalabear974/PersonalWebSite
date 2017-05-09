<?php
  require("navbar.php");
?>

<script type="text/javascript">
$(document).ready(function () {
  $(document).scroll(function () {
    s = $(document).scrollTop();
    $('.headImage img').transition({ y: (s/2)+'px' },0.1,'linear');
    $('.headImage .item').transition({ y: (s/3)+'px' },0.1,'linear');
    $('.navbar').transition({ y: (s/1.2)+'px' },0.1,'linear');
  })
})
</script>

<script type="text/javascript">
$(document).scroll(function () {
  s = $(document).scrollTop();
  if (s > 100 && s < 300){
    var add=((s-80)*110)/220;
    $('#circleImage1,#circleImage2,#circleImage3').animate({"width":140+add,"height":140+add},0.1);
  }else if(s >300){
    $('#circleImage1,#circleImage2,#circleImage3').css({"width":250,"height":250});
  }
})
</script>

<script type="text/javascript">
$(function () {
 if($(document).scrollTop()> 200 ){
    $('#circleImage1,#circleImage2,#circleImage3').animate("width",250);
    $('#circleImage1,#circleImage2,#circleImage3').animate("height",250);
 }
});
</script>


<?php 
if($lang=="fr"){
    require("indexFR.php");
}else {
    require("indexEN.php");
} 

?>
<script type="text/javascript">
$(".item")
.mouseenter(function () {
  $(".item").animate({y:(($(document).scrollTop()/3)-20)+"px"},100,"linear");
  
})
.mouseleave(function () {
  $(".item").animate({y:($(document).scrollTop()/3)+"px"},100,"linear");
})
</script>
<?php
require("footer.php");
?>
