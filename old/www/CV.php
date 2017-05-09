<?php
  require("navbar.php");
?>
<script type="text/javascript">
$(window).resize(function (){
	w=$(window).width();
	if(w > 1600){
		$("#CVframe").css("height",1400);
		$("#CVframe").css("width", 970);
	}else{
		$("#CVframe").css("height",((w*1400)/1600));
		$("#CVframe").css("width", ((w*970)/1600));
	}
})
</script>
<script type="text/javascript">
$(function () {
	w = $(window).width();
if(w > 1250){
	$("#CVframe").css("height",1400);
	$("#CVframe").css("width", 970);
}else{
	$("#CVframe").css("height",((w*1400)/1600));
	$("#CVframe").css("width", ((w*970)/1600));
}
});
</script>
<script type="text/javascript">
$(document).ready(function () {
  $(document).scroll(function () {
    s = $(document).scrollTop();
    $('.CVbar').transition({ y: (s/1.3)+'px' },0.1,'linear');
  })
})
</script>

<div class="CVbar">
</div>
<div class="container CV">
	<?php
	if($lang=="fr"){
		echo '<iframe id="CVframe" src="http://docs.google.com/gview?url=http://arobert.me/pdf/Adrien_ROBERT_CV.pdf&embedded=true" frameborder="0"></iframe>';
	}else{
		echo '<iframe id="CVframe" src="http://docs.google.com/gview?url=http://arobert.me/pdf/Adrien_ROBERT_CV_en.pdf&embedded=true" frameborder="0"></iframe>';
	}
	?>
	
</div>

<div class="container marketing">
<?php
require("footer.php");
?>
