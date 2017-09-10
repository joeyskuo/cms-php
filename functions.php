<?php

function search() {
  global $connection;
  if(isset($_POST['submit'])){
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
  }
}


function showPosts() {

}
?>
