<?php
    include "connection.php";

    //check if url have GET id
    if (isset($_GET['id'])) {
        //get the id value from url and save it on $id variable
        $id = ($_GET["id"]);

        //show the data from database that has id=$id
        $query = "SELECT * FROM artist WHERE id='$id'";
        $result = mysqli_query($connection, $query);

        //if the data fail, this alert will be show up
        if(!$result){
            die ("Query Error: ".mysqli_errno($connection).
               " - ".mysqli_error($connection));
          }
        
          //get the data from database
          $data = mysqli_fetch_assoc($result);
          //if there is no data in database, this order will be run
          if (!count($data)) {
            echo "<script>alert('There is no data found in database.');window.location='index.php';</script>";
         }
    }else{
        //if there is no GET id, will be direct to index.php
        echo "<script>alert('Please input the id.');window.location='index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<style type="text/css">
    * {
      font-family: "Trebuchet MS";
    }
    h1 {
      text-transform: uppercase;
      color: rgb(35, 41, 48);
    }
    button {
      background-color: rgb(35, 41, 48);
      color: #fff;
      padding: 10px;
      text-decoration: none;
      font-size: 12px;
      border: 0px;
      margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background:  rgba(255,255,255,0.1);
      border: 2px solid #ccc;
      border-radius: .8rem;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 10px;
      border-radius: .8rem;
      background: rgba(255,255,255,0.1);
    }
    </style>
</head>
<body>
<!-- *************** Navbar Start ************* -->
<nav>
        <h2 class="h2">MyFav Artist</h2>
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>  <br>
<!-- *************** Navbar End ************* -->

<!-- **************** Edit Artist Start ************* -->
    <center>
        <h1>Edit Artist <?php echo $data['artist_name']; ?></h1>
    </center>

    <form method="POST" action="edit-process.php" enctype="multipart/form-data" >
        <section class="base">
            <input name="id" value="<?php echo $data['id']; ?>"  hidden />
            <div>
                <label>Image</label>
                <img src="img/<?php echo $data['images']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                <input type="file" name="images" />
                <i style="float: left;font-size: 11px;color: red">Ignore if you don't change the image</i>
            </div>
            <div>
                <label>Artist Name</label>
                <input type="text" name="artist_name" value="<?php echo $data['artist_name']; ?>" autofocus="" required="" />
            </div>
            <div>
                <label>Description</label>
                <input type="text" name="description" value="<?php echo $data['description']; ?>" />
            </div>
            <div>
                <label>Favorite Song</label>
                <input type="text" name="fav_song" value="<?php echo $data['fav_song']; ?>" />
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
        </section>
    </form>
<!-- **************** Edit Artist Start ************* -->
</body>
</html>