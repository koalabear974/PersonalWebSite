<?php
if(isset($_GET["lang"])){
  if($_GET["lang"]=="en"){
    $lang="en";
  }elseif ($_GET["lang"]=="fr") {
    $lang="fr";
  }else{
    $lang="fr";
  }
}else{
  $lang="fr";
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Adrien Robert</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/dist/js/jquery.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-53335184-1', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <script type="text/javascript">
        $(document).ready( function() {
        $('.dropdown-toggle').dropdown();
        });
        </script>

        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <?php $page="../index.php"; if($lang=="fr"){ echo '<a class="navbar-brand" href="'.$page.'?lang=fr">Adrien Robert</a>';} else{echo '<a class="navbar-brand" href="'.$page.'?lang=en">Adrien Robert</a>'; }?>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){ echo 'class="active"';} ?>><?php $page="../index.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Accueil</a>';} else{echo '<a href="'.$page.'?lang=en">Home</a>'; }?></li>
                <li <?php if(basename($_SERVER['PHP_SELF'])=="aboutme.php"){ echo 'class="active"';} ?>><?php $page="../aboutme.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">A propos de moi</a>';} else{echo '<a href="'.$page.'?lang=en">About Me</a>'; }?></li>
                <li <?php if(basename($_SERVER['PHP_SELF'])=="CV.php"){ echo 'class="active"';} ?>><?php $page="../CV.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">CV</a>';} else{echo '<a href="'.$page.'?lang=en">CV</a>'; }?></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php if($lang=="fr"){ echo 'Projets';} else{echo 'Projects'; }?> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li <?php if(basename($_SERVER['PHP_SELF'])=="projectIndex.php"){ echo 'class="active"';} ?>><?php $page="../projectIndex.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Index des projets</a>';} else{echo '<a href="'.$page.'?lang=en">Project\'s index </a>'; }?></li>
                    <li class="divider"></li>
                    <li class="dropdown-header"><?php if($lang=="fr"){ echo 'Projets Professionels';} else{echo 'Professional Projects'; }?></li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=="embeddedSystems.php"){ echo 'class="active"';} ?>><?php $page="embeddedSystems.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Systèmes embarqués</a>';} else{echo '<a href="'.$page.'?lang=en">Embedded Systems</a>'; }?></li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=="virtualization.php"){ echo 'class="active"';} ?>><?php $page="virtualization.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Virtualisation</a>';} else{echo '<a href="'.$page.'?lang=en">Virtualization</a>'; }?></li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=="IS.php"){ echo 'class="active"';} ?>><?php $page="IS.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Systèmes d\'informations</a>';} else{echo '<a href="'.$page.'?lang=en">Information Systems</a>'; }?></li>
                    <li class="divider"></li>
                    <li class="dropdown-header"><?php if($lang=="fr"){ echo 'Projets Personnels';} else{echo 'Personal Projects'; }?></li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=="webAnimation.php"){ echo 'class="active"';} ?>><?php $page="webAnimation.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Animations JQuery</a>';} else{echo '<a href="'.$page.'?lang=en">Web Animations</a>'; }?></li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=="webcup2014.php"){ echo 'class="active"';} ?>><?php $page="webcup2014.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Webcup 2014</a>';} else{echo '<a href="'.$page.'?lang=en">Webcup 2014</a>'; }?></li>
                    <li <?php if(basename($_SERVER['PHP_SELF'])=="webcup2013.php"){ echo 'class="active"';} ?>><?php $page="webcup2013.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Webcup 2013</a>';} else{echo '<a href="'.$page.'?lang=en">Webcup 2013</a>'; }?></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li <?php if($lang=="fr"){ echo 'class="active"';} ?>><a style="padding-left:4px;padding-right:4px;" href=<?php echo '"'.basename($_SERVER['PHP_SELF']).'?lang=fr"'; ?>><img height="18px" width=auto src="../img/FRflag.png"></a></li>
                <li <?php if($lang=="en"){ echo 'class="active"';} ?>><a style="padding-left:4px;padding-right:4px;" href=<?php echo '"'.basename($_SERVER['PHP_SELF']).'?lang=en"'; ?>><img height="18px" width=auto src="../img/UKflag.png"></a></li>
                <li <?php if(basename($_SERVER['PHP_SELF'])=="contact.php"){ echo 'class="active"';} ?>><?php $page="contact.php"; if($lang=="fr"){ echo '<a href="'.$page.'?lang=fr">Contact</a>';} else{echo '<a href="'.$page.'?lang=en">Contact</a>'; }?></li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>