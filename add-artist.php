<?php
    include "connection.php";
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

<!-- ************* ADD ARTIST START ************* -->
    <center>
        <h1>Add Artist</h1>
    </center>

    <form method="POST" action="add-process.php" enctype="multipart/form-data">
        <section class="base">
            <div>
                <label>Image</label>
                <input type="file" name="images" required="" />
            </div>
            <div>
                <label>Artist Name</label>
                <input type="text" name="artist_name" autofocus="" required="" />
            </div>
            <div>
                <label>Description</label>
                <input type="text" name="description" />
            </div>
            <div>
                <label>Favorite Song</label>
                <input type="text" name="fav_song" />
            </div>
            <div>
                <button type="submit">Save</button>
            </div>
        </section>
    </form>
<!-- ************* ADD ARTIST END ************* -->
</body>
</html>
