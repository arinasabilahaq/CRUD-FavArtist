<?php
    include "connection.php";

    // variable for data from form
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

            //run INSERT query for add the data to database
            $query = "INSERT INTO artist (images, artist_name, description, fav_song) VALUES ('$images', '$artist_name', '$description', '$fav_song')";
            $result = mysqli_query($connection, $query);

            //check if there is an error in query
            if(!$result){
                die ("Error Query run time: ".mysqli_errno($connection).
                     " - ".mysqli_error($connection));
            } else {
                //show allert and direct to index.php page
                echo "<script>alert('Add Data Successful.');window.location='index.php';</script>";
            }

        }else {
            //if file type is not png,jpg, and jpeg this alert will be show
            echo "<script>alert('file type can only be png, jpg or jpeg.');window.location='add-artist.php';</script>";
        }
    } else {
        $query = "INSERT INTO artist (images, artist_name, description, fav_song) VALUES ('$images', '$artist_name', '$description', '$fav_song')";
        $result = mysqli_query($connection, $query);

        //check if there is an error
        if(!$result){
            die ("Error Query run time: ".mysqli_errno($connection).
                 " - ".mysqli_error($connection));
        } else {
            //show allert and direct to index.php page
            echo "<script>alert('Add Data Successful.');window.location='index.php';</script>";
        }
    }
?>