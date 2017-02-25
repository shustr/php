#shustr/php

 This repo is for simple classifields website where you may add listings and see them published. Basically, it is the way to learn some coding features for a such website. 
As per avaialble regions, it's designed for New Zealand. 
It has very basic functionality and at the moment not secure at all. The code will be updated while learning more features and functionality of PHP.
Any suggestions are welcome.

<br />Files and their description:
<br />dbconnect.php		// contains DB name, user and password. It's called from other files.
<br />getDistricts.php	// gets district according to chosen region from DB
<br />handler_addad.php	// when adding listing, it calls to execute this handler
<br />handler_delad.php	// this handler supposed to delete listing from DB
<br />index.php		// main page with list of ads
<br />listing.php		// page with listing content

MySQL Database currently has the following layout:

mysql> describe regions;
<br />+-------------+--------------+------+-----+---------+-------+
<br />| Field       | Type         | Null | Key | Default | Extra |
<br />+-------------+--------------+------+-----+---------+-------+
<br />| region_id   | int(11)      | NO   | PRI | NULL    |       |
<br />| region_name | varchar(255) | NO   |     | NULL    |       |
<br />+-------------+--------------+------+-----+---------+-------+
<br />2 rows in set (0.00 sec)
<br />mysql> describe districts;
<br />+---------------+--------------+------+-----+---------+----------------+
<br />| Field         | Type         | Null | Key | Default | Extra          |
<br />+---------------+--------------+------+-----+---------+----------------+
<br />| district_id   | int(11)      | NO   | PRI | NULL    | auto_increment |
<br />| region_id     | int(11)      | NO   | MUL | NULL    |                |
<br />| district_name | varchar(255) | NO   |     | NULL    |                |
<br />+---------------+--------------+------+-----+---------+----------------+
<br />3 rows in set (0.00 sec)

mysql> describe listings;
<br />+----------------+------------------------+------+-----+---------+----------------+
<br />| Field          | Type                   | Null | Key | Default | Extra          |
<br />+----------------+------------------------+------+-----+---------+----------------+
<br />| listing_id     | int(11)                | NO   | PRI | NULL    | auto_increment |
<br />| listing_uniqid | varchar(255)           | YES  |     | NULL    |                |
<br />| user_email     | varchar(255)           | YES  |     | NULL    |                |
<br />| listing_title  | varchar(255)           | YES  |     | NULL    |                |
<br />| listing_body   | text                   | YES  |     | NULL    |                |
<br />| listing_price  | decimal(10,2) unsigned | YES  |     | NULL    |                |
<br />| district_id    | int(11)                | YES  |     | NULL    |                |
<br />+----------------+------------------------+------+-----+---------+----------------+
<br />7 rows in set (0.01 sec)

