<?php
  require("navbar.php");
?>
<script src="paralax/js/raphael-min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  $(".headImageAM img").css("margin-top","-"+($("#itemInner1").height()+50)+"px");
  $(document).scroll(function () {
    s = $(document).scrollTop();
    $('.headImageAM img').transition({ y: (s/2)+'px' },0.1,'linear');
    $('.headImageAM .itemAM').transition({ y: (s/3)+'px' },0.1,'linear');
    $('.navbar').transition({ y: (s/1.2)+'px' },0.1,'linear');
    if($(window).width()>1000){
      if( s > 850 && s < 1100 ){
        $('.hobbies').transition({ y: ((s-1100)/3)+'px' },0.1,'linear');
        //alert(s);
      }
    }else {
      //alert(s);
      if( s > 1500 && s < 1900 ){
        $('.hobbies').transition({ y: ((s-1800)/4)+'px' },0.1,'linear');
      }
    }
  });
})
</script>
<script type="text/javascript">
$(window).resize(function (){
    $(".headImageAM img").css("margin-top","-"+($("#itemInner1").height()+50)+"px");
})
</script>
<?php 
if($lang=="fr"){
    require("aboutmeFR.php");
}else {
    require("aboutmeEN.php");
} 

?>



<?php
require("footer.php");
?>