<?php include "includes/categories/categories_form_add.php"; ?>

<?php

if(isset($_GET['edit'])) {
  $cat_id = $_GET['edit'];
  include "includes/categories/categories_form_update.php";
}

 ?>
