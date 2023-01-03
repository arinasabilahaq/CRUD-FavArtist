<?php
    include "connection.php";

    // variable for data from form
    $id = $_POST['id'];
    $images = $_FILES['images']['name'];
    $artist_name = $_POST['artist_name'];
    $description = $_POST['description'];
    $fav_song = $_POST['fav_song'];

    if($images != ""){
        $file_type = array('png','jpg','jpeg'); //image file type
        $x = explode('.', $images); //separate file name with uploaded file type
        $type = strtolower(end($x));
        $file_tmp = $_FILES['images']['tmp_name']; 
        $random_number = rand(1,999);
        $new_images_name = $random_number.'-'.$images; //combine random number with real file name

        if(in_array($type, $file_type) === true)  {
            move_uploaded_file($file_tmp, 'img/'.$new_images_name); //move images to img folder

            //run UPDATE according artist ID from edit page
            $query = "UPDATE artist SET images = '$images', artist_name = '$artist_name', description = '$description', fav_song = '$fav_song'";
            $query .= "WHERE id = '$id'";
            $result = mysqli_query($connection, $query);

            //check if there is an error in query
            if(!$result){
                die ("Error Query run time: ".mysqli_errno($connection).
                     " - ".mysqli_error($connection));
            } else {
                //show allert and direct to index.php page
                echo "<script>alert('Edit Data Successful.');window.location='index.php';</script>";
            }

        }else {
            //if file type is not png,jpg, and jpeg this alert will be show
            echo "<script>alert('file type can only be png, jpg or jpeg.');window.location='edit-artist.php';</script>";
        }
    } else {
        $query = "UPDATE artist SET images = '$images', artist_name = '$artist_name', description = '$description', fav_song = '$fav_song'";
        $query .= "WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        //check if there is an error
        if(!$result){
            die ("Error Query run time: ".mysqli_errno($connection).
                 " - ".mysqli_error($connection));
        } else {
            //show allert and direct to index.php page
            echo "<script>alert('Edit Data Successful.');window.location='index.php';</script>";
        }
    }
?>