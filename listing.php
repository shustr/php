<html>
<head>
<title>listing page - new - shows particular ad</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!-- JQuery JS -->
<script type="text/javascript" src="/8/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/8/js/init.js"></script>
</head>
<body>

<div align="center"><h2>View (new) description of listing</h2> 
<p> <a href="/8/"> -- Click here to go back to main page -- </a> </p>
</div>


<?php // listing.php (to view listing content)
include 'dbconnect.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
//
$glst = $mysql->prepare("SELECT listing_title, listing_body, listing_price, district_id FROM listings WHERE listing_uniqid='$id'");
$glst->execute();
$glst->bind_result($title, $body, $price, $districtid);
while($row = $glst->fetch()): {
                echo "<h3>" . $title . "</h3><br />";
                echo "<h4>Description:</h4> <p>" . $body . "</p><br />";
                echo "<h4>Price: " . $price . "</h4><br />";
        }
endwhile;
// Get District NaMe (and region name too)
$gdnm = $mysql->prepare("SELECT r.region_name, d.district_name FROM districts d LEFT JOIN regions r ON r.region_id = d.region_id WHERE d.district_id='$districtid'");
$gdnm->execute();
$gdnm->bind_result($regionname, $districtname);
while($row = $gdnm->fetch()): {
	echo "<b>Location:</b> <i>" . $regionname . " / " . $districtname . "</i><br />";
}
endwhile;

$mysql->close();
?>
<!-- delete listing from db BEGIN -->
<div>
<form id="form" name="form" action="/handler_delad.php" method="POST">
<input type="submit" name="Delete" value="Delete" />
</form>
</div>
<!-- delete listing from db END -->

</body>
</html>
