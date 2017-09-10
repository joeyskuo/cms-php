<?php include "../includes/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include "includes/header.php"; ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "includes/sidebar.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <?php

                        if(isset($_POST['submit'])) {

                          $cat_title = $_POST['cat_title'];

                          if($cat_title == "" || empty($cat_title)) {

                            echo "This field should not be empty";

                          } else {

                            $query = "INSERT INTO categories(cat_title)";
                            $query .= "VALUE('{$cat_title}')";

                            $create_category_query = mysqli_query($connection, $query);

                            if(!$create_category_query) {
                              die('QUERY FAILED' . mysqli_error($connection));
                            }

                          }

                        }
                         ?>

                        <div class="col-xs-6">
                          <?php include "includes/categories_forms.php"; ?>
                        </div>
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php // FIND ALL CATEGORIES QUERY
                              $query = "SELECT * FROM categories";
                              $select_categories = mysqli_query($connection,$query);
                              while($row = mysqli_fetch_assoc($select_categories)) {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>";
                                echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                echo "<tr>";
                              } ?>

                              <?php // DELETE Query

                                if(isset($_GET['delete'])){

                                  $cat_del_id = $_GET['delete'];
                                  $query = "DELETE FROM categories WHERE cat_id = {$cat_del_id} ";
                                  $del_query = mysqli_query($connection, $query);
                                  header("Location: categories.php");
                                }

                               ?>


                            </tbody>


                          </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
