<?php
  /**
  * This file contains the head tag for all files.
  * @licence https://standards.casegames.ch/cgs/0003/v1.txt Case Games Open-Source licence
  */
  include_once "../configuration.php";
  include_once "../includes/class.inc.php";
  $U = new U();
?>
<meta charset="utf-8">
<title><?php echo getSetting("site.name") ?></title>
<?php
  if(isset($_COOKIE["css"])){
    if($_COOKIE["css"] == "l"){
      echo '<link rel="stylesheet" href="styles/'+$U->getSetting("style.light.filename")+' type="text/css" />';
    }elseif ($_COOKIE["css"] == "d") {
      echo '<link rel="stylesheet" href="styles/'+$U->getSetting("style.dark.filename")+' type="text/css" />';
    }else{
    echo '<link rel="stylesheet" href="styles/'+$U->getSetting("style.light.filename")+' type="text/css" />';
    }
  }else{
    echo '<link rel="stylesheet" href="styles/'+$U->getSetting("style.light.filename")+' type="text/css" />';
  }
?>

<script>
  function switchdark(c){
    document.cookie = "css=" + c;
    location.reload();
  }
</script>
<meta name="author" content="<?php echo $U->getSetting("site.author") ?>">
<meta name="description" content="<?php echo $U->getSetting("site.description") ?>">
<meta name="keywords" content="<?php echo $U->getSetting("site.keywords") ?>">
<meta http-equiv="content-language" content="<?php echo $U->getSetting("site.lang") ?>">
<meta name="robots" content="<?php echo $U->getSetting("site.robots") ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
