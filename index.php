<!DOCTYPE html>
<html lang="en">

<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>
<body>

  <!-- Navigation -->
  <?php include "includes/navbar.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
          <h1 class="page-header">
              Latest Posts
              <small>All Categories</small>
          </h1>
            <!-- Blog Entries Column -->
            <div class="col-md-8">

              <?php
              $query = "SELECT * FROM posts";
              $posts = mysqli_query($connection, $query);
              while($row = mysqli_fetch_assoc($posts)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

               ?>


                 <!-- First Blog Post -->
                 <h2>
                     <a href="#"><?php echo $post_title ?></a>
                 </h2>
                 <p class="lead">
                     by <a href="index.php"><?php echo $post_author ?></a>
                 </p>
                 <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                 <hr>
                 <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                 <hr>
                 <p><?php echo $post_content ?></p>
                 <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
              <?php }  ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php" ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
