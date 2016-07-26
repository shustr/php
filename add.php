<?php include_once 'dbconnect.php'; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>Add listing</TITLE>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!-- JQuery JS -->
<script type="text/javascript" src="/8/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/8/js/init.js"></script>
<!-- Preload Images -->
<script language="JavaScript">
<!--
pic1 = new Image(16, 16); 
pic1.src="/8/icons/loader.gif";
//-->
</script>

<style type="text/css">
<!--
#district_drop_down, #no_district_drop_down, #loading_district_drop_down { display: none; }
--> 
</style>

</head>

<body>
<div align="center"><h2>Add listing on this page.</h2> 
<p> <a href="/8/"> -- Click here to go back to main page -- </a> </p>
</div>
<br />

<div>
<form id="form" name="form" action="/8/handler_addad.php" method="POST">
<br /><br />
<select id="region" name="region" class="btn btn-default dropdown-toggle">
<?php
$stmt = $mysql->prepare("SELECT region_id, region_name FROM `regions`");
$stmt->execute();
$stmt->bind_result($code, $name);
while ($row = $stmt->fetch()) : ?>
<option value="<?php echo $code; ?>"><?php echo $name; ?></option>
<?php 
endwhile; 
?>
</select>
<br /><br />
<div id="district_drop_down">
<select id="district" name="district" class="btn btn-default dropdown-toggle"><option>district...</option></select></div>
	 <span id="loading_district_drop_down"><img src="/8/icons/loader.gif" width="16" height="16" align="absmiddle">&nbsp;Loading...</span>
	 <div id="no_district_drop_down">This region has no districts.</div>
     <br /><br />

<!-- insert validating code from here -->     
Your email: <input type="text" name="email"><br /><br />
Listing title: <input type="text" name="title"><br /><br />
Listing description: <input type="text" name="body" size="70" height="120"><br />
Price: <input type="text" name="price"><br /><br />     
<input type="submit" name="Submit" value="Submit" />
</form> 

</div>

</BODY>
</HTML>
