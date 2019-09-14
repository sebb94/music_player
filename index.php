<?php include("includes/includedFiles.php");?>
<h1 class="pageHeadingBig">You Might Also Like</h1>

    <div class="gridViewContainer">

    <?php 
    
    $album_query = mysqli_query( $con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

    while( $row = mysqli_fetch_array($album_query) ){


        echo "<div class='gridViewItem'>
            <span role='link' tab-index='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
            <img src='" . $row['artworkPath'] . "'>
            
            <div class='gridViewInfo'>
            
            " . $row['title'] . "'
            
            </div>
            </span>
        </div>";
    }
    
    ?>

    </div>
