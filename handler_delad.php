<?php // change code comletely!
if(isSet($_POST['Delete'])) {
        include 'dbconnect.php';
        $unid = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
// delete entry and redirect to main page
        $query = "DELETE from listings WHERE listing_uniqid=$unid";
        $delAd = $mysql->prepare($query);
        $delAd->execute();
        $mysql->close();

} else {
    echo "something was wrong in your data, check it please";
}

die();
?>