<?php
require "utils.php";
deleteDisc($_GET['disc_id']);
header('Location: ../../index.php');
?>
