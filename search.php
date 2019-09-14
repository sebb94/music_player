<?php include("includes/includedFiles.php");

if( isset($_GET['term'])){

    $term = urldecode($_GET['term']);
}else{
    $term = "";
}
?>

<section class="searchContainer">

    <h4>Search for an artist, album or song</h4>
    <input type="text" class="searchInput" value="<?php echo $term;?>" placeholder="Start typing..." onfocus="var temp_value=this.value; 
this.value=''; this.value=temp_value">

</section>

<script>
    

     $('.searchInput').focus();
       $(function () {
        var timer;
        $(".searchInput").keyup(function(){
            $(".searchInput").focus();
            clearTimeout(timer);

            timer = setTimeout(function(){
                var val = $(".searchInput").val();
                openPage("search.php?term=" + val);
            },1000);
               
        });


    });

</script>
