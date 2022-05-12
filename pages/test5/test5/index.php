<?php
$title='Welcome to JoBins News!';
?>
<div id="category1">

  <!-- / #category1 --></div>
<?php
ob_start();
require 'header.php';
$contents = ob_get_clean();
echo $contents;
require 'rss.php';
?>
