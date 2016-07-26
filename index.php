<html>
<head>
<title>index page | list of ads supposed to be here</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".breadcrumbnav li a").click(function(){
        $("p").removeAttr("href");
    });
});
</script>
</head>
<body>
<div align="center"><h2>Main INDEX page that showing list of listings.</h2> 
<p> <a href="/8/add.php"> -- Click here to add your listing -- </a> </p>
</div>
    <div class="breadcrumbnav">Sort list of ads: 
        <ul><li><a href="/8/">Show all</a> | </li>
            <li><a href="/8/index.php?sort=auck" name="auck">Auckland area</a> | </li>
            <li><a href="/8/index.php?sort=welg" name="welg">Wellington area</a> | </li>
            <li><a href="/8/index.php?sort=chch" name="chch">Christchurch and Canterbury</a> | </li>
            <li><a href="/8/index.php?sort=nisl" name="nisl">North Island only</a> | </li>
            <li><a href="/8/index.php?sort=sisl" name="sisl">South Island only</a></li>
        </ul>
    </div>
<?php
include 'dbconnect.php';
$sortlocation = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    if($sortlocation === 'auck' ){
        $gllauck = $mysql->prepare("SELECT listing_title, listing_price, listing_uniqid FROM listings WHERE district_id BETWEEN 4 AND 12");
        $showsorted = $gllauck;
    } elseif ($sortlocation === 'welg' ) {
        $gllwelg = $mysql->prepare("SELECT listing_title, listing_price, listing_uniqid FROM listings WHERE district_id BETWEEN 44 AND 51");
        $showsorted = $gllwelg;
    } elseif ($sortlocation === 'chch' ) {
        $gllchch = $mysql->prepare("SELECT listing_title, listing_price, listing_uniqid FROM listings WHERE district_id BETWEEN 59 AND 67");
        $showsorted = $gllchch;
} elseif ($sortlocation === 'nisl' ) {
        $gllnisl = $mysql->prepare("SELECT listing_title, listing_price, listing_uniqid FROM listings WHERE district_id BETWEEN 1 AND 51");
        $showsorted = $gllnisl;
    } elseif ($sortlocation === 'sisl' ) {
        $gllsisl = $mysql->prepare("SELECT listing_title, listing_price, listing_uniqid FROM listings WHERE district_id BETWEEN 52 AND 77");
        $showsorted = $gllsisl;        
    } else {    
        $gllall = $mysql->prepare("SELECT listing_title, listing_price, listing_uniqid FROM listings");
        $showsorted = $gllall;
    }
$showsorted->execute();
$showsorted->bind_result($title, $price, $uniqid);
while($row = $showsorted->fetch()): {
            $strAdTitle = $title . " " . $price;
      		$strAdLink = "<a href = '/8/listing.php?id=" . $uniqid . "'>" . $strAdTitle . "</a>";
		    echo "<li>" . $strAdLink . "</li>";	
}
endwhile;
$mysql->close();
?>
<br /><br />

</body>
</html>
