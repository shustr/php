<?php
if(isSet($_POST['Submit'])) {
        include 'dbconnect.php';
        $unid = uniqid();
        //$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
          $email = filter_input(INPUT_POST, 'email');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }
//
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_MAGIC_QUOTES);
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_MAGIC_QUOTES);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
        $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_STRING);
        $query = "INSERT INTO listings (listing_id, listing_uniqid, user_email, listing_title, listing_body, listing_price, district_id) VALUES ('', '$unid', '$email', '$title', '$body', '$price', '$district')";
        $addAd = $mysql->prepare($query);
        $addAd->execute();
        $mysql->close();
        header('Location: http://hoko.alexey.nz/8/');
} else {
    echo "something was wrong in your data, check it please";
}

die();
?>
