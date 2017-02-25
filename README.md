#shustr/php

 This repo is for simple classifields website where you may add listings and see them published. Basically, it is the way to learn some coding features for a such website. 
As per avaialble regions, it's designed for New Zealand. 
It has very basic functionality and at the moment not secure at all. The code will be updated while learning more features and functionality of PHP.
Any suggestions are welcome.

Files and their description:
dbconnect.php		// contains DB name, user and password. It's called from other files.
getDistricts.php	// gets district according to chosen region from DB
handler_addad.php	// when adding listing, it calls to execute this handler
handler_delad.php	// this handler supposed to delete listing from DB
index.php		// main page with list of ads
listing.php		// page with listing content

MySQL Database currently has the following layout:

mysql> describe regions;
+-------------+--------------+------+-----+---------+-------+
| Field       | Type         | Null | Key | Default | Extra |
+-------------+--------------+------+-----+---------+-------+
| region_id   | int(11)      | NO   | PRI | NULL    |       |
| region_name | varchar(255) | NO   |     | NULL    |       |
+-------------+--------------+------+-----+---------+-------+
2 rows in set (0.00 sec)
mysql> describe districts;
+---------------+--------------+------+-----+---------+----------------+
| Field         | Type         | Null | Key | Default | Extra          |
+---------------+--------------+------+-----+---------+----------------+
| district_id   | int(11)      | NO   | PRI | NULL    | auto_increment |
| region_id     | int(11)      | NO   | MUL | NULL    |                |
| district_name | varchar(255) | NO   |     | NULL    |                |
+---------------+--------------+------+-----+---------+----------------+
3 rows in set (0.00 sec)

mysql> describe listings;
+----------------+------------------------+------+-----+---------+----------------+
| Field          | Type                   | Null | Key | Default | Extra          |
+----------------+------------------------+------+-----+---------+----------------+
| listing_id     | int(11)                | NO   | PRI | NULL    | auto_increment |
| listing_uniqid | varchar(255)           | YES  |     | NULL    |                |
| user_email     | varchar(255)           | YES  |     | NULL    |                |
| listing_title  | varchar(255)           | YES  |     | NULL    |                |
| listing_body   | text                   | YES  |     | NULL    |                |
| listing_price  | decimal(10,2) unsigned | YES  |     | NULL    |                |
| district_id    | int(11)                | YES  |     | NULL    |                |
+----------------+------------------------+------+-----+---------+----------------+
7 rows in set (0.01 sec)

