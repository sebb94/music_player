<?php include("includes/header.php");?>

<h1 class="pageHeadingBig">You Might Also Like</h1>

    <div class="gridViewContainer">

    <?php 
    
    $album_query = mysqli_query( $con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

    while( $row = mysqli_fetch_array($album_query) ){


        echo '<div class="gridViewItem">
            <img src="' . $row['artworkPath'] . '">

            <div class="gridViewInfo">
            
            "' . $row['title'] . '"
            
            </div>
        </div>';
    }
    
    ?>

    </div>

<?php include("includes/footer.php");?>