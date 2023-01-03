<?php
    include "connection.php";
    //retrieve the id you want to delete
    $id = $_GET["id"];

    //run query DELETE for delete the data
    $query = "DELETE FROM artist WHERE id='$id' ";
    $query_result = mysqli_query($connection, $query);

    //check if there is an error
    if(!$query_result) {
        die ("Failed to delete data: ".mysqli_errno($connection).
         " - ".mysqli_error($connection));
      } else {
        echo "<script>alert('Delete Data Successfull.');window.location='index.php';</script>";
      }
?>