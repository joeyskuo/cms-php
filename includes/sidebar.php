<?php include "./functions.php" ?>

<div class="col-md-4">

  <?php   if(isset($_POST['submit'])){
      $search = $_POST['search'];

      $query = "SELECT * FROM posts where post_tags LIKE '%$search%' ";
      $search_query = mysqli_query($connection, $query);

      if(!$search_query) {
        die("QUERY FAILED" . mysqli_error($connection));
      }

      $count = mysqli_num_rows($search_query);
      if($count == 0) {
        echo "<h1> NO RESULT </h1>";
      } else {
        echo "some result";
      }
    } ?>
  <?php include "./includes/searchbar.php" ?>
    <!-- Blog Categories Well -->
    <div class="well">
      <?php
        $query = "SELECT * FROM categories";
        $categories = mysqli_query($connection, $query);
        ?>


        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                  <?php
                  while($row = mysqli_fetch_assoc($categories)){
                    $cat_title = $row['cat_title'];
                    echo "<li><a href='#'>{$cat_title}</a></li>";
                  }?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>
