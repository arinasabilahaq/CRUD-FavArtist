<?php
    include "connection.php";
?>
<head>
<style type="text/css">
.blog-post{
    justify-content: center;
    width: 50%;
    max-width: 50%;
    height: 100px;
    padding: 5rem;
    background-color: rgba(255,255,255,0.1);
    box-shadow: 0 1.4rem 8rem rgba(0,0,0,.2);
    display: absolute;
    margin-left: 250px;
    margin-right: 0px;
    border-radius: .8rem;
    margin-top: 30px;
}


.blog-post_img{
    width: 30rem;
    height: 15rem;
    transform: translateX(-8rem);
    position: relative;
    
}

.blog-post_img img{
    width: 50%;
    height: 50%;
    object-fit: cover;
    display: block;
    border-radius: .8rem;
}

.blog-post_title{
    font-size: 1.5rem;
    margin: -17rem 10rem 2rem;
    text-transform: uppercase;
    color: rgb(35, 41, 48);
    position: flex;
}

.blog-post_text{
    margin-left: 10rem; 
    margin-bottom: 1rem;
    font-size: 1rem;
    color: rgba(0,0,0,.7);
} 

.link1{
    display:flex;
    margin-left: 850px;
    margin-top: -30px;
    
}

.link2{
    display:flex;
    margin-left: 900px;
    margin-top: -20px;
    
}

@media screen and (max-width: 1068px) {
    .blog-post{
        max-width: 80rem;
    }
    .blog-post_img{
        min-width: 30rem;
        max-width: 30rem;
    }
}

@media screen and (max-width: 768px){
    .blog-post{
        padding: 2.5rem;
        flex-direction: column;
    }
    .blog-post_img{
        min-width: 30rem;
        max-width: 30rem;
        transform: translate(0, -8rem);
    }
} 

a {
    text-decoration: none;
    font-weight: lighter;
    color: rgb(252, 246, 246);
}

a:hover {
    color: rgb(79, 86, 95);
}
</style>
</head>

<body>
<div>
    <center><h1>Artist</h1></center>
    <center><a href="add-artist.php">+ &nbsp; Add Artist</a></center><br>
</div>
<?php
            //run query for show all data acording by id
            $query = "SELECT * FROM artist ORDER BY id ASC";
            $result = mysqli_query($connection, $query);

            //check if there is an error
            if(!$result){
                die ("Query Error: ".mysqli_errno($connection).
                " - ".mysqli_error($connection));
            }

            $no = 1;

            while($row = mysqli_fetch_assoc($result))
            {
            ?>
            <!-- *********** result ************* -->
                <div class="blog-post">
                    <div class="blog-post_img">
                        <img src="img/<?php echo $row['images']; ?>">
                    </div>
                    <div class="blog-post_info">
                        <h1 class="blog-post_title"><?php echo $row['artist_name']; ?></h1>
                        <p class="blog-post_text"><?php echo substr($row['description'], 0, 1000); ?></p>
                        <p class="blog-post_text">My Favorite Song: <?php echo substr($row['fav_song'], 0, 1000); ?></p>
                    </div>
                    
                </div>
                <div class="link1">
                    <a href="edit-artist.php?id=<?php echo $row['id']; ?>">Edit</a>
                </div>
                <div class="link2">
                    <a href="delete-process.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this data?')">Delete</a>
                </div>
                <?php
                    $no++;
            }
                ?>
</body>