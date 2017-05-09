<?php
  require("navbar.php");
?>

<style type="text/css">
.navbar-wrapper {
	position:fixed;
}
img.color-flip {
  -webkit-transition: all .2s ease-in-out;
  -webkit-transform: scale(1);
  -moz-transition: all .2s ease-in-out;
  -moz-transform: scale(1);
  filter: none;
  -webkit-filter: grayscale(0);

}

img.color-flip:hover {
  -webkit-transition: all .2s ease-in-out;
  -webkit-transform: scale(1.1);
  -moz-transition: all .2s ease-in-out;
  -moz-transform: scale(1.1);
  filter: url(img/filter.svg#grayscale);
  filter: gray; /* IE5+ */
  -webkit-filter: grayscale(1); /* Webkit Nightlies & Chrome Canary */

}
</style>


<?php
if($lang=="fr"){
  require("projectIndexFR.php");
}else{
  require("projectIndexEN.php");
}
?>


<?php
require("footer.php");
?>